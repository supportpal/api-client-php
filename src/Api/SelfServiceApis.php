<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Comment;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
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
    private $formatType;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     * @throws \SupportPal\ApiClient\Exception\HttpResponseException
     */
    public function postComment(Comment $comment): Comment
    {
        try {
            $serializedComment = $this->serializer->serialize($comment, $this->formatType);
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->apiClient->postSelfServiceComment(
            $serializedComment
        );
        /** @var array<mixed> $body */
        $body = $this->decoder->decode((string) $response->getBody(), $this->formatType)['data'];
        return $this->createComment($body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Comment[]
     */
    public function getComments(array $queryParameters): array
    {
        $response = $this->apiClient->getComments($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->decoder->decode((string) $response->getBody(), $this->formatType)['data'];

        return array_map([$this, 'createComment'], $body);
    }

    /**
     * @param array<mixed> $data
     * @return Comment
     */
    private function createComment(array $data): Comment
    {
        /** @var Comment $model */
        $model = $this->modelCollectionFactory->create(Comment::class, $data);
        return $model;
    }
}
