<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait CommentApis, includes all api calls related to comments
 * @package SupportPal\ApiClient\ApiClient\SelfService
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
    public function postSelfServiceComment(array $body): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
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
}
