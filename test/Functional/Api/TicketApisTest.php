<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\TicketApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new TicketApisData)->getApiCalls();
    }
}
