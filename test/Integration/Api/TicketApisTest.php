<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
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

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPostEndpoints(): array
    {
        return (new TicketApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPutEndpoints(): array
    {
        return (new TicketApisData)->putApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getApiClass(): string
    {
        return TicketApi::class;
    }
}
