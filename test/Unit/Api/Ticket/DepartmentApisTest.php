<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Department;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;

class DepartmentApisTest extends BaseTicketApiTest
{
    /** @var int */
    private $testDepartmentId = 1;

    public function testGetDepartments(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new DepartmentData)->getAllResponse(), Department::class);

        $this->apiClient
            ->getDepartments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $departments = $this->api->getDepartments([]);
        self::assertEquals($output, $departments);
    }

    public function testGetDepartment(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new DepartmentData)->getResponse(), Department::class);

        $this
            ->apiClient
            ->getDepartment($this->testDepartmentId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedDepartment = $this->api->getDepartment($this->testDepartmentId);
        self::assertEquals($output, $returnedDepartment);
    }
}
