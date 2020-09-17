<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Contains all ApiClient calls to SelfService Apis
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\ApiClient
 */
trait SelfServiceApis
{
    use ApiClientAware;

    /**
     *
     * This method posts a self service comment
     * @param string $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postSelfServiceComment(string $body): ResponseInterface
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
        $request = $this->getRequestFactory()->create(
            'GET',
            ApiDictionary::SELF_SERVICE_COMMENT,
            [],
            null,
            $queryParameters
        );

        return $this->sendRequest($request);
    }
}
