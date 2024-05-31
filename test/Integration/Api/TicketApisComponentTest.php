<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\TicketApisData;
use SupportPal\ApiClient\Tests\Integration\ApiComponentTest;

class TicketApisComponentTest extends ApiComponentTest
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
    protected function getDeleteEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getDownloadsEndpoints(): array
    {
        return (new TicketApisData)->downloadApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getApiClass(): string
    {
        return TicketApi::class;
    }
}
