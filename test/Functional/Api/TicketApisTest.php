<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getDepartments' => [DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE, []],
        'getTicketSettings' => [SettingsData::SUCCESSFUL_GET_RESPONSE, []],
        'getChannelSettings' => [ChannelSettingsData::GET_SUCCESSFUL_RESPONSE_DATA, ['web']]
    ];

    /**
     * @var array<mixed>
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
