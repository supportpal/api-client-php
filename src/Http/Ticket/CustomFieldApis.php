<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

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
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_CUSTOMFIELD, $queryParameters);
    }

    /**
     * @param int $customFieldId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCustomField(int $customFieldId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::TICKET_CUSTOMFIELD . '/' .  $customFieldId,
            []
        );
    }
}
