<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ApiTest extends TestCase
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

    protected function setUp(): void
    {
        parent::setUp();
        $this->serializer = $this->prophesize(SerializerInterface::class);
        $this->apiClient = $this->prophesize(ApiClient::class);
        $this->serializationType = 'json';
        $this->modelCollectionFactory = $this->prophesize(ModelCollectionFactory::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);

        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();
        /** @var ApiClient $apiClient */
        $apiClient = $this->apiClient->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->modelCollectionFactory->reveal();
        $this->api = new Api(
            $serializer,
            $apiClient,
            $modelCollectionFactory,
            $this->serializationType,
            $decoder
        );
    }
}
