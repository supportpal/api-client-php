<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
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
     * @throws InvalidArgumentException
     */
    protected function getDownloadsEndpoints(): array
    {
        return (new TicketApisData)->downloadApiCalls();
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function getApi(): Api
    {
        return $this->supportPal->getTicketApi();
    }
}
