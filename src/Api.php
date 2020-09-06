<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\CoreSettings;
use Symfony\Component\Serializer\SerializerInterface;

class Api
{
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
    private $serializationType;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    public function __construct(
        SerializerInterface $serializer,
        ApiClient $apiClient,
        ModelCollectionFactory $modelCollectionFactory,
        string $serializationType
    ) {
        $this->serializer = $serializer;
        $this->apiClient = $apiClient;
        $this->serializationType = $serializationType;
        $this->modelCollectionFactory = $modelCollectionFactory;
    }

    /**
     * This method fetches all core settings
     * @return CoreSettings
     */
    public function getCoreSettings(): CoreSettings
    {
        $response = $this->apiClient->getCoreSettings();
        $body = json_decode((string) $response->getBody(), true)['data'];
        /** @var CoreSettings $model */
        $model = $this->modelCollectionFactory->create(CoreSettings::class, $body);

        return $model;
    }

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     *@throws Exception\HttpResponseException
     */
    public function postComment(Comment $comment): Comment
    {
        $response = $this->apiClient->postSelfServiceComment(
            $this->serializer->serialize($comment, $this->serializationType)
        );
        $body = json_decode((string) $response->getBody(), true)['data'];

        /** @var Comment $model */
        $model = $this->modelCollectionFactory->create(Comment::class, $body);

        return $model;
    }
}
