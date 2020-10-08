<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\CustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getDepartments' => [DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE, []],
        'getDepartment' => [DepartmentData::GET_DEPARTMENT_SUCCESSFUL_RESPONSE, [1]],
        'getTicketSettings' => [SettingsData::SUCCESSFUL_GET_RESPONSE, []],
        'getChannelSettings' => [ChannelSettingsData::GET_SUCCESSFUL_RESPONSE_DATA, ['web']],
        'getTicketCustomFields' => [CustomFieldData::GET_CUSTOMFIELDS_SUCCESSFUL_RESPONSE_DATA, []],
        'getTicketPriorities' => [PriorityData::GET_PRIORITIES_SUCCESSFUL_RESPONSE, []],
        'getTicketPriority' => [PriorityData::GET_PRIORITY_SUCCESSFUL_RESPONSE, [1]],
        'getTicketStatuses' => [StatusData::GET_STATUSES_SUCCESSFUL_RESPONSE, []],
        'getTicketStatus' => [StatusData::GET_STATUS_SUCCESSFUL_RESPONSE, [1]],
    ];

    /**
     * @var array<mixed>
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
