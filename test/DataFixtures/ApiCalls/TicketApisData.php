<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateMessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\UpdateMessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\UpdateTicketData;
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
        $ticketData = new TicketData;
        $attachmentData = new AttachmentData;
        $messageData = new MessageData;

        return [
            'getDepartments' => [$departmentData->getAllResponse(), []],
            'getDepartment' => [$departmentData->getResponse(), [1]],
            'getSettings' => [$settingsData->getResponse(), []],
            'getChannelSettings' => [$channelSettingsData->getResponse(), ['web']],
            'getCustomFields' => [$ticketCustomFieldData->getAllResponse(), []],
            'getCustomField' => [$ticketCustomFieldData->getResponse(), [1]],
            'getPriorities' => [$priorityData->getAllResponse(), []],
            'getPriority' => [$priorityData->getResponse(), [1]],
            'getStatuses' => [$statusData->getAllResponse(), []],
            'getStatus' => [$statusData->getResponse(), [1]],
            'getTickets' => [$ticketData->getAllResponse(), []],
            'getTicket' => [$ticketData->getResponse(), [1]],
            'getAttachments' => [$attachmentData->getAllResponse(), []],
            'getAttachment' => [$attachmentData->getResponse(), [1]],
            'getMessages' => [$messageData->getAllResponse(), [1]],
            'getMessage' => [$messageData->getResponse(), [1]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createTicket = new CreateTicketData;
        $createMessage = new CreateMessageData;

        return [
            'createTicket' => [$createTicket->getFilledInstance(), $createTicket->getResponse()],
            'createMessage' => [$createMessage->getFilledInstance(), $createMessage->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateTicketData = new UpdateTicketData;
        $updateMessageData = new UpdateMessageData;

        return [
            'updateTicket' => [1, $updateTicketData->getFilledInstance(), $updateTicketData->getResponse()],
            'updateMessageData' => [1, $updateMessageData->getFilledInstance(), $updateMessageData->getResponse()],
        ];
    }

    /**
     * @return array<string, int>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteTicket' => 1,
            'deleteMessage' => 1,
        ];
    }

    /**
     * @return array<string, Model>
     * @throws InvalidArgumentException
     */
    public function downloadApiCalls(): array
    {
        return ['downloadAttachment' => 1];
    }
}
