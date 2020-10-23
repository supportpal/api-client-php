<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class TicketApisTest extends ApiClientTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $departmentData = new DepartmentData;
        $settingsData = new SettingsData;
        $channelSettingsData = new ChannelSettingsData;
        $ticketCustomFieldData = new TicketCustomFieldData;
        $priorityData = new PriorityData;
        $statusData = new StatusData;
        $attachmentData = new AttachmentData;
        $ticketData = new TicketData;
        $messageData = new MessageData;

        return [
            'getDepartments' => [$departmentData->getAllResponse(), [[]]],
            'getDepartment' => [$departmentData->getResponse(), [1]],
            'getTicketSettings' => [$settingsData->getResponse(), []],
            'getChannelSettings' => [$channelSettingsData->getResponse(), ['web']],
            'getTicketCustomFields' => [$ticketCustomFieldData->getAllResponse(), [[]]],
            'getTicketCustomField' => [$ticketCustomFieldData->getResponse(), [1]],
            'getTicketPriorities' => [$priorityData->getAllResponse(), [[]]],
            'getTicketPriority' => [$statusData->getResponse(), [1]],
            'getTicketStatuses' => [$statusData->getAllResponse(), [[]]],
            'getTicketStatus' => [$statusData->getResponse(), [1]],
            'getTicketAttachments' => [$attachmentData->getAllResponse(), [[]]],
            'getTicketAttachment' => [$attachmentData->getResponse(), [1]],
            'getTickets' => [$ticketData->getAllResponse(), [[]]],
            'getTicket' => [$ticketData->getResponse(), [1]],
            'getTicketMessage' => [$messageData->getResponse(), [1]],
            'getTicketMessages' => [$messageData->getAllResponse(), [[]]],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        $ticketData = (new TicketData)->getResponse();
        $messageData = new MessageData;

        return [
            'postTicket' => [CreateTicketData::DATA, $ticketData],
            'postTicketMessage' => [$messageData->getArrayData(), $messageData->getResponse()],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        $ticketData = new TicketData;

        return [
            'updateTicket' => [
                $ticketData->getArrayData(),
                $ticketData->getResponse()
            ],
        ];
    }
}
