<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;

class TicketApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
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
            'getTicketCustomField' => [$ticketCustomFieldData->getResponse(), [1]],
            'getTicketPriorities' => [$priorityData->getAllResponse(), []],
            'getTicketPriority' => [$priorityData->getResponse(), [1]],
            'getTicketStatuses' => [$priorityData->getAllResponse(), []],
            'getTicketStatus' => [$statusData->getResponse(), [1]],
            'getTicketAttachments' => [$attachmentData->getAllResponse(), []],
            'getTicketAttachment' => [$attachmentData->getResponse(), [1]],
            'getTickets' => [$ticketData->getAllResponse(), []],
            'getTicket' => [$ticketData->getResponse(), [1]],
            'getTicketMessage' => [$messageData->getResponse(), [1]],
            'getTicketMessages' => [$messageData->getAllResponse(), [1]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createTicket = (new CreateTicket)->fill(CreateTicketData::DATA);
        $ticketData = (new TicketData)->getResponse();
        $messageData = new MessageData;

        return [
            'postTicket' => [$createTicket, $ticketData],
            'postTicketMessage' => [$messageData->getFilledInstance(), $messageData->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $ticketData = new TicketData;

        return [
            'updateTicket' => [
                $ticketData->getFilledInstance(),
                $ticketData->getArrayData(),
                $ticketData->getResponse()
            ],
        ];
    }
}
