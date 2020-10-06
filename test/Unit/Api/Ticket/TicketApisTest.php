<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Department;
use SupportPal\ApiClient\Model\Ticket\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class TicketApisTest extends ApiTest
{
    public function testGetDepartments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE,
            Department::class
        );

        $this
            ->apiClient
            ->getDepartments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getDepartments([]);
        self::assertSame($expectedOutput, $articles);
    }

    public function testGetTicketsSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            SettingsData::SUCCESSFUL_GET_RESPONSE,
            Settings::class
        );

        $this
            ->apiClient
            ->getTicketSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $coreSettings = $this->api->getTicketSettings();
        $this->assertSame($expectedOutput, $coreSettings);
    }
}
