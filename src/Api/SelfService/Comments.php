<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\SelfService\Request\CreateComment;

use function array_map;

trait Comments
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getComments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getComments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createCommentModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getComment(int $commentId): Comment
    {
        $response = $this->getApiClient()->getComment($commentId);

        return $this->createCommentModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createComment(CreateComment $comment): Comment
    {
        $response = $this->getApiClient()->postComment($comment->toArray());

        return $this->createCommentModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createCommentModel(array $data): Comment
    {
        return new Comment($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
