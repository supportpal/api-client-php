<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait CustomFieldApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCustomFields(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_CUSTOMFIELD, $queryParameters);
    }

    /**
     * @param int $userCustomFieldId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCustomField(int $userCustomFieldId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::USER_CUSTOMFIELD . '/' . $userCustomFieldId,
            []
        );
    }
}
