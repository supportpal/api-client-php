<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Tests\Unit\Api\CoreApisTest;
use SupportPal\ApiClient\Tests\Unit\Api\SelfServiceApisTest;
use Symfony\Component\Serializer\SerializerInterface;

class ApiTest extends TestCase
{

    use SelfServiceApisTest;
    use CoreApisTest;

    /**
     * @var ObjectProphecy
     */
    private $serializer;

    /**
     * @var ObjectProphecy
     */
    private $apiClient;

    /**
     * @var string
     */
    private $serializationType;

    /**
     * @var ObjectProphecy
     */
    private $modelCollectionFactory;

    /**
     * @var Api
     */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serializer = $this->prophesize(SerializerInterface::class);
        $this->apiClient = $this->prophesize(ApiClient::class);
        $this->serializationType = 'json';
        $this->modelCollectionFactory = $this->prophesize(ModelCollectionFactory::class);

        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();
        /** @var ApiClient $apiClient */
        $apiClient = $this->apiClient->reveal();
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->modelCollectionFactory->reveal();
        $this->api = new Api(
            $serializer,
            $apiClient,
            $modelCollectionFactory,
            $this->serializationType
        );
    }
}
