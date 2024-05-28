<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

/**
 * Trait CommentApis, includes all api calls related to comments
 * @package SupportPal\ApiClient\Http\ApiClient\SelfService
 */
trait CommentApis
{
    use ApiClientAware;

    /**
     *
     * This method posts a self service comment
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postComment(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'POST',
            ApiDictionary::SELF_SERVICE_COMMENT,
            [],
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getComments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_COMMENT, $queryParameters);
    }

    /**
     * @param int $commentId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getComment(int $commentId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::SELF_SERVICE_COMMENT . '/' .  $commentId,
            []
        );
    }
}
