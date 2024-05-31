<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class BaseTicketApiTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

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
