<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\CustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

class TicketApisTest extends ApiTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return [
            'getDepartments' => [DepartmentData::getAllResponse(), []],
            'getDepartment' => [DepartmentData::getResponse(), [1]],
            'getTicketSettings' => [SettingsData::getResponse(), []],
            'getChannelSettings' => [ChannelSettingsData::getResponse(), ['web']],
            'getTicketCustomFields' => [CustomFieldData::getAllResponse(), []],
            'getTicketPriorities' => [PriorityData::getAllResponse(), []],
            'getTicketPriority' => [PriorityData::getResponse(), [1]],
            'getTicketStatuses' => [StatusData::getAllResponse(), []],
            'getTicketStatus' => [StatusData::getResponse(), [1]],
            'getTicketAttachments' => [AttachmentData::getAllResponse(), []],
            'getTicketAttachment' => [AttachmentData::getResponse(), [1]],
            'getTickets' => [TicketData::getAllResponse(), []],
            'getTicket' => [TicketData::getResponse(), [1]],
            'getTicketMessage' => [MessageData::getResponse(), [1]],
            'getTicketMessages' => [MessageData::getAllResponse(), [1]],
        ];
    }
}
