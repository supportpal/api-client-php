<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
{
    /**
     * @var array[]
     */
    private $getEndpoints = [
        'getDepartments' => [DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE, []],
    ];

    /**
     * @var array[]
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
