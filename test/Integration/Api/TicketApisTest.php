<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\TicketApisData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

class TicketApisTest extends ApiTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new TicketApisData)->getApiCalls();
    }
}
