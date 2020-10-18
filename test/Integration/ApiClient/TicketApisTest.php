<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
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
            'getDepartments' => [$departmentData->getAllResponse(), []],
            'getDepartment' => [$departmentData->getResponse(), [1]],
            'getTicketSettings' => [$settingsData->getResponse(), []],
            'getChannelSettings' => [$channelSettingsData->getResponse(), ['web']],
            'getTicketCustomFields' => [$ticketCustomFieldData->getAllResponse(), []],
            'getTicketPriorities' => [$priorityData->getAllResponse(), []],
            'getTicketPriority' => [$statusData->getResponse(), [1]],
            'getTicketStatuses' => [$statusData->getAllResponse(), []],
            'getTicketStatus' => [$statusData->getResponse(), [1]],
            'getTicketAttachments' => [$attachmentData->getAllResponse(), []],
            'getTicketAttachment' => [$attachmentData->getResponse(), [1]],
            'getTickets' => [$ticketData->getAllResponse(), []],
            'getTicket' => [$ticketData->getResponse(), [1]],
            'getTicketMessage' => [$messageData->getResponse(), [1]],
            'getTicketMessages' => [$messageData->getAllResponse(), [1]],
        ];
    }
}
