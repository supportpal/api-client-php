<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Comment;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

use function array_map;

/**
 * Trait CommentApis, includes all related ApiCalls pre and post processing to comments
 * @package SupportPal\ApiClient\Api\SelfService
 */
trait CommentApis
{
    use ApiAware;

    /**
     * This method creates a comment in SupportPal
     * @param Comment $comment
     * @return Comment
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function postComment(Comment $comment): Comment
    {
        try {
            $commentArray = $this->getModelToArrayConverter()->convertOne($comment);
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->getApiClient()->postComment($commentArray);

        return $this->createComment($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getComments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getComments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createComment'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $commentId
     * @return Comment
     * @throws HttpResponseException
     */
    public function getComment(int $commentId): Comment
    {
        $response = $this->getApiClient()->getComment($commentId);

        return $this->createComment($this->decodeBody($response)['data']);
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

    abstract protected function getApiClient(): SelfServiceApiClient;
}
