<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\Ticket\AttachmentApis;
use SupportPal\ApiClient\ApiClient\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\ApiClient\Ticket\CustomFieldApis;
use SupportPal\ApiClient\ApiClient\Ticket\DepartmentApis;
use SupportPal\ApiClient\ApiClient\Ticket\MessageApis;
use SupportPal\ApiClient\ApiClient\Ticket\PriorityApis;
use SupportPal\ApiClient\ApiClient\Ticket\SettingsApis;
use SupportPal\ApiClient\ApiClient\Ticket\StatusApis;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 *  Contains all ApiClient calls to Tickets module
 * Trait TicketApis
 * @package SupportPal\ApiClient\ApiClient
 */
trait TicketApis
{
    use AttachmentApis;
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use PriorityApis;
    use MessageApis;
    use SettingsApis;
    use StatusApis;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTickets(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET, $queryParameters);
    }

    /**
     * @param int $ticketId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicket(int $ticketId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET . '/' .  $ticketId, []);
    }

    /**
     * @param int $ticketId
     * @param array $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function updateTicket(int $ticketId, array $body): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
            'PUT',
            ApiDictionary::TICKET_TICKET . '/' . $ticketId,
            [],
            $body
        );

        return $this->sendRequest($request);
    }
}
