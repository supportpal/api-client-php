<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait CommentApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getComments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_COMMENT, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getComment(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_COMMENT . '/' .  $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postComment(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], $body);

        return $this->sendRequest($request);
    }
}
