<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait DepartmentApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getDepartments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_DEPARTMENT, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getDepartment(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_DEPARTMENT . '/' .  $id, []);
    }
}
