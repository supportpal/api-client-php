<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class DepartmentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers SupportPal\ApiClient\Api\Ticket\DepartmentApis
 * @covers \SupportPal\ApiClient\Api
 */
class DepartmentApisTest extends ApiTest
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
