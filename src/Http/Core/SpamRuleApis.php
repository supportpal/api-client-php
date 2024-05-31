<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait SpamRuleApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getSpamRules(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_SPAM_RULES, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getSpamRule(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_SPAM_RULES . '/' . $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postSpamRule(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::CORE_SPAM_RULES, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putSpamRule(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::CORE_SPAM_RULES . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteSpamRule(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::CORE_SPAM_RULES . '/' . $id);

        return $this->sendRequest($request);
    }
}
