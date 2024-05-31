<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateMessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\UpdateTicketData;
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
            'getSettings' => [$settingsData->getResponse(), []],
            'getChannelSettings' => [$channelSettingsData->getResponse(), ['web']],
            'getCustomFields' => [$ticketCustomFieldData->getAllResponse(), [[]]],
            'getCustomField' => [$ticketCustomFieldData->getResponse(), [1]],
            'getPriorities' => [$priorityData->getAllResponse(), [[]]],
            'getPriority' => [$statusData->getResponse(), [1]],
            'getStatuses' => [$statusData->getAllResponse(), [[]]],
            'getStatus' => [$statusData->getResponse(), [1]],
            'getAttachments' => [$attachmentData->getAllResponse(), [[]]],
            'getAttachment' => [$attachmentData->getResponse(), [1]],
            'getTickets' => [$ticketData->getAllResponse(), [[]]],
            'getTicket' => [$ticketData->getResponse(), [1]],
            'getMessage' => [$messageData->getResponse(), [1]],
            'getMessages' => [$messageData->getAllResponse(), [[]]],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        $createTicket = new CreateTicketData;
        $createMessage = new CreateMessageData;

        return [
            'postTicket' => [$createTicket::DATA, $createTicket->getResponse()],
            'postMessage' => [$createMessage::DATA, $createMessage->getResponse()],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        $updateTicketData = new UpdateTicketData;

        return [
            'putTicket' => [UpdateTicketData::DATA, $updateTicketData->getResponse()],
        ];
    }

    /**
     * @return array<mixed>
     */
    protected function getDownloadsEndpoints(): array
    {
        return ['downloadAttachment' => 1];
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientClass()
    {
        return TicketClient::class;
    }
}
