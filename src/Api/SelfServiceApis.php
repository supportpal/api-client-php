<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Comment;
use Symfony\Component\Serializer\SerializerInterface;

trait SelfServiceApis
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

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     * @throws \SupportPal\ApiClient\Exception\HttpResponseException
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
