<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use SupportPal\ApiClient\Api\CoreApis;
use SupportPal\ApiClient\Api\SelfServiceApis;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class Api
{
    use SelfServiceApis;
    use CoreApis;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var string
     */
    private $formatType;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    public function __construct(
        SerializerInterface $serializer,
        ApiClient $apiClient,
        ModelCollectionFactory $modelCollectionFactory,
        string $formatType,
        DecoderInterface $decoder
    ) {
        $this->serializer = $serializer;
        $this->apiClient = $apiClient;
        $this->formatType = $formatType;
        $this->modelCollectionFactory = $modelCollectionFactory;
        $this->decoder = $decoder;
    }
}
