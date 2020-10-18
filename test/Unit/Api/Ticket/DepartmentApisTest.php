<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class DepartmentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\DepartmentApis
 * @covers \SupportPal\ApiClient\Api
 */
class DepartmentApisTest extends ApiTest
{
    /** @var int */
    private $testDepartmentId = 1;

    public function testGetDepartments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new DepartmentData)->getAllResponse(),
            Department::class
        );

        $this
            ->apiClient
            ->getDepartments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $departments = $this->api->getDepartments([]);
        self::assertSame($expectedOutput, $departments);
    }

    public function testGetDepartment(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new DepartmentData)->getResponse(),
            Department::class
        );

        $this
            ->apiClient
            ->getDepartment($this->testDepartmentId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedDepartment = $this->api->getDepartment($this->testDepartmentId);
        self::assertSame($expectedOutput, $returnedDepartment);
    }
}
