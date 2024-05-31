<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait IpBanApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getIpBans(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_IP_BAN, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getIpBan(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_IP_BAN . '/' . $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postIpBan(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::CORE_IP_BAN, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putIpBan(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::CORE_IP_BAN . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteIpBan(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::CORE_IP_BAN . '/' . $id);

        return $this->sendRequest($request);
    }
}
