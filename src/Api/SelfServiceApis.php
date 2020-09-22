<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\ArticleType;
use SupportPal\ApiClient\Model\Comment;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

/**
 * Contains all ApiCalls pre and post processing that falls under SelfService Module
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\Api
 */
trait SelfServiceApis
{
    use ApiAware;

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function postComment(Comment $comment): Comment
    {
        try {
            $serializedComment = $this->getSerializer()->serialize($comment, $this->getFormatType());
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->getApiClient()->postSelfServiceComment($serializedComment);
        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];
        return $this->createComment($body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Comment[]
     * @throws HttpResponseException
     */
    public function getComments(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getComments($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createComment'], $body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ArticleType[]
     * @throws HttpResponseException
     */
    public function getArticleTypes(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getArticleTypes($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createArticleType'], $body);
    }

    /**
     * @param array<mixed> $data
     * @return Comment
     */
    private function createComment(array $data): Comment
    {
        /** @var Comment $model */
        $model = $this->getModelCollectionFactory()->create(Comment::class, $data);
        return $model;
    }

    /**
     * @param array<mixed> $data
     * @return ArticleType
     */
    private function createArticleType(array $data): ArticleType
    {
        /** @var ArticleType $model */
        $model = $this->getModelCollectionFactory()->create(ArticleType::class, $data);
        return $model;
    }
}
