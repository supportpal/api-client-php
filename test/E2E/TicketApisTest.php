<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Dictionary\ApiDictionary;

class TicketApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::TICKET_CUSTOMFIELD => 'getCustomFields',
            ApiDictionary::TICKET_DEPARTMENT => 'getDepartments',
            ApiDictionary::TICKET_STATUS => 'getStatuses',
            ApiDictionary::TICKET_PRIORITY => 'getPriorities',
            ApiDictionary::TICKET_TICKET => 'getTickets',
            ApiDictionary::TICKET_ATTACHMENT => 'getAttachments',
            //ApiDictionary::TICKET_MESSAGE => 'getMessages', This doesn't work as it takes $ticketId as first param
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::TICKET_CUSTOMFIELD => 'getCustomField',
            ApiDictionary::TICKET_DEPARTMENT => 'getDepartment' ,
            ApiDictionary::TICKET_PRIORITY => 'getPriority',
            ApiDictionary::TICKET_STATUS => 'getStatus',
            ApiDictionary::TICKET_TICKET => 'getTicket',
            ApiDictionary::TICKET_ATTACHMENT => 'getAttachment',
            ApiDictionary::TICKET_MESSAGE => 'getMessage',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    public function testTicketSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::TICKET_SETTINGS, 'getSettings');
    }

    protected function getApi(): TicketApi
    {
        return $this->getSupportPal()->getTicketApi();
    }
}
