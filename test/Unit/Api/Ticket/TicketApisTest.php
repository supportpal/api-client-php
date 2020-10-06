<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Department;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
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
}
