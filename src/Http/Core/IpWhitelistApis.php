<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait IpWhitelistApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getWhitelistedIps(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_IP_WHITELIST, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getWhitelistedIp(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_IP_WHITELIST . '/' . $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postWhitelistedIp(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::CORE_IP_WHITELIST, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putWhitelistedIp(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::CORE_IP_WHITELIST . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteWhitelistedIp(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::CORE_IP_WHITELIST . '/' . $id);

        return $this->sendRequest($request);
    }
}
