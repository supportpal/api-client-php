<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Tests\TestCase;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiTest
 * @package SupportPal\ApiClient\Tests\Unit
 * @coversNothing
 */
abstract class ApiTest extends TestCase
{
    /**
     * @var ObjectProphecy
     */
    protected $serializer;

    /**
     * @var ObjectProphecy
     */
    protected $apiClient;

    /**
     * @var string
     */
    protected $serializationType;

    /**
     * @var ObjectProphecy
     */
    protected $modelCollectionFactory;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var ObjectProphecy
     */
    protected $decoder;

    /**
     * @var ObjectProphecy
     */
    private $collectionFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serializer = $this->prophesize(SerializerInterface::class);
        $this->apiClient = $this->prophesize(ApiClient::class);
        $this->serializationType = 'json';
        $this->modelCollectionFactory = $this->prophesize(ModelCollectionFactory::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);
        $this->collectionFactory = $this->prophesize(CollectionFactory::class);

        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();
        /** @var ApiClient $apiClient */
        $apiClient = $this->apiClient->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->modelCollectionFactory->reveal();
        /** @var CollectionFactory $collectionFactory */
        $collectionFactory = $this->collectionFactory->reveal();

        $this->api = new Api(
            $serializer,
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
                $responseData['count'] ?? count($models),
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
}
