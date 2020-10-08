<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait DepartmentApis
 * @package SupportPal\ApiClient\ApiClient\Ticket
 */
trait DepartmentApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getDepartments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_DEPARTMENT, $queryParameters);
    }
}
