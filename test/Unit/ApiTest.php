<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

use function array_push;
use function current;
use function is_array;
use function json_encode;

/**
 * Class ApiTest
 * @package SupportPal\ApiClient\Tests\Unit
 * @covers \SupportPal\ApiClient\Api
 */
abstract class ApiTest extends TestCase
{
    protected const TEST_ID = 1;

    /** @var ObjectProphecy */
    protected $modelToArrayConverter;

    /** @var ObjectProphecy */
    protected $apiClient;

    /** @var string */
    protected $serializationType;

    /** @var ObjectProphecy */
    protected $modelCollectionFactory;

    /** @var Api */
    protected $api;

    /** @var ObjectProphecy */
    protected $decoder;

    /** @var ObjectProphecy */
    private $collectionFactory;

    /** @var string */
    private $formatType = 'json';

    protected function setUp(): void
    {
        parent::setUp();
        $this->modelToArrayConverter = $this->prophesize(ModelToArrayConverter::class);
        $this->apiClient = $this->prophesize(ApiClient::class);
        $this->serializationType = 'json';
        $this->modelCollectionFactory = $this->prophesize(ModelCollectionFactory::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);
        $this->collectionFactory = $this->prophesize(CollectionFactory::class);

        /** @var ModelToArrayConverter $modelToArrayConverter */
        $modelToArrayConverter = $this->modelToArrayConverter->reveal();
        /** @var ApiClient $apiClient */
        $apiClient = $this->apiClient->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->modelCollectionFactory->reveal();
        /** @var CollectionFactory $collectionFactory */
        $collectionFactory = $this->collectionFactory->reveal();

        $this->api = new Api(
            $modelToArrayConverter,
            $apiClient,
            $modelCollectionFactory,
            $this->serializationType,
            $decoder,
            $collectionFactory
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
        $formatType = 'json';
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        $this->decoder
            ->decode(json_encode($responseData), $formatType)
            ->shouldBeCalled()
            ->willReturn($responseData);

        if (is_array(current($responseData['data']))) {
            $models = [];
            foreach ($responseData['data'] as $key => $value) {
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
     * @param array<mixed> $modelArrayData
     * @param class-string $className
     * @param class-string|null $outputClassName
     * @return array<mixed>
     */
    protected function postCommonExpectations(
        array $responseData,
        array $modelArrayData,
        string $className,
        string $outputClassName = null
    ): array {
        $input = $this->prophesize($className);
        $output = $this->prophesize($outputClassName ?? $className);

        /** @var Model $inputMock */
        $inputMock = $input->reveal();

        $this
            ->modelToArrayConverter
            ->convertOne($inputMock)
            ->willReturn($modelArrayData)
            ->shouldBeCalled();

        $this->decoder
            ->decode(json_encode($responseData), $this->formatType)
            ->shouldBeCalled()
            ->willReturn($responseData);

        $this
            ->modelCollectionFactory
            ->create($outputClassName ?? $className, $responseData['data'])
            ->willReturn($output);

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        return [$response, $inputMock, $output];
    }

    /**
     * @param class-string $className
     * @return Model
     */
    protected function postIncompleteDataCommonExpectations(string $className): Model
    {
        $input = $this->prophesize($className);
        /** @var Model $inputMock */
        $inputMock = $input->reveal();

        $this
            ->modelToArrayConverter
            ->convertOne($inputMock)
            ->willThrow(UninitializedPropertyException::class)
            ->shouldBeCalled();

        $this->expectException(InvalidArgumentException::class);

        return $inputMock;
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
        $input = $this->prophesize($className);
        $output = $this->prophesize($className);

        $input->getId()->willReturn(self::TEST_ID);
        /** @var Model $inputMock */
        $inputMock = $input->reveal();

        $this->decoder
            ->decode(json_encode($responseData), $this->formatType)
            ->shouldBeCalled()
            ->willReturn($responseData);

        $this
            ->modelCollectionFactory
            ->create($outputClassName ?? $className, $responseData['data'])
            ->willReturn($output);

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($responseData));

        return [$response, $inputMock, $output];
    }
}
