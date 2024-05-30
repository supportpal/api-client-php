<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\Department;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class DepartmentApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

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
        self::assertEquals($expectedOutput, $departments);
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
        self::assertEquals($expectedOutput, $returnedDepartment);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return TicketApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
