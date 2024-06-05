<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait UserCustomFieldApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getUserCustomFields(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_CUSTOMFIELD, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUserCustomField(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_CUSTOMFIELD . '/' . $id, []);
    }
}
