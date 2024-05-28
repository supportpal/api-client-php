<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

/**
 * Trait DepartmentApis
 * @package SupportPal\ApiClient\Http\ApiClient\Ticket
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

    /**
     * @param int $departmentId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getDepartment(int $departmentId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_DEPARTMENT . '/' .  $departmentId, []);
    }
}
