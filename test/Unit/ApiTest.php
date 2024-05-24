<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Tests\TestCase;

use function array_push;
use function current;
use function is_array;
use function json_encode;

/**
 * Class ApiTest
 * @package SupportPal\ApiClient\Tests\Unit
 * @covers \SupportPal\ApiClient\Api\Api
 */
abstract class ApiTest extends TestCase
{
    protected const TEST_ID = 1;

    /** @var ObjectProphecy|ApiClient */
    protected $apiClient;

    /** @var string */
    protected $serializationType;

    /** @var ObjectProphecy|ModelCollectionFactory */
    protected $modelCollectionFactory;

    /** @var Api */
    protected $api;

    /** @var ObjectProphecy|CollectionFactory */
    private $collectionFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->apiClient = $this->prophesize($this->getApiClientName());
        $this->modelCollectionFactory = $this->prophesize(ModelCollectionFactory::class);
        $this->collectionFactory = $this->prophesize(CollectionFactory::class);

        /** @var ApiClient $apiClient */
        $apiClient = $this->apiClient->reveal();
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->modelCollectionFactory->reveal();
        /** @var CollectionFactory $collectionFactory */
        $collectionFactory = $this->collectionFactory->reveal();

        $apiName = $this->getApiName();
        $this->api = new $apiName(
            $modelCollectionFactory,
            $collectionFactory,
            $apiClient
        );
    }

    /**
     * @param array<mixed> $responseData
     * @param class-string $expectedClass
     * @return array<mixed>
     */
    protected function makeCommonExpectations(array $responseData, string $expectedClass): array
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        if (is_array(current($responseData['data']))) {
            $models = [];
            foreach ($responseData['data'] as $value) {
                $model = $this->prophesize($expectedClass);
                $this->modelCollectionFactory
                    ->create($expectedClass, $value)
                    ->shouldBeCalled()
                    ->willReturn($model->reveal());
                array_push($models, $model->reveal());
            }

            $collection = $this->prophesize(Collection::class);
            $this->collectionFactory->create(
                $responseData['count'],
                $models
            )->shouldBeCalled()
            ->willReturn($collection->reveal());

            return [$collection->reveal(), $response];
        }

        $expectedOutput = $this->prophesize($expectedClass);
        $this->modelCollectionFactory
            ->create($expectedClass, $responseData['data'])
            ->shouldBeCalled()
            ->willReturn($expectedOutput->reveal());

        return [$expectedOutput->reveal(), $response];
    }

    /**
     * @param array<mixed> $responseData
     * @param class-string|null $outputClassName
     * @return array<mixed>
     */
    protected function postCommonExpectations(
        array $responseData,
        ?string $outputClassName = null
    ): array {
        $output = $this->prophesize($outputClassName);

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        $this->modelCollectionFactory
            ->create($outputClassName, $responseData['data'])
            ->willReturn($output);

        return [$response, $output];
    }

    /**
     * @param class-string $className
     * @param array<mixed> $responseData
     * @return array<mixed>
     */
    protected function putCommonExpectations(
        string $className,
        array $responseData
    ): array {
        $output = $this->prophesize($className);

        $this->modelCollectionFactory
            ->create($className, $responseData['data'])
            ->willReturn($output);

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        return [$response, $output];
    }

    /**
     * @return class-string<Api>
     */
    abstract protected function getApiName(): string;

    /**
     * @return class-string<ApiClient>
     */
    abstract protected function getApiClientName(): string;
}
