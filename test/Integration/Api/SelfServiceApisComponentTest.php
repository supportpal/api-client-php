<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\SelfServiceApisData;
use SupportPal\ApiClient\Tests\Integration\ApiComponentTest;

class SelfServiceApisComponentTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new SelfServiceApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return (new SelfServiceApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return (new SelfServiceApisData)->putApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getDeleteEndpoints(): array
    {
        return (new SelfServiceApisData)->deleteApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getDownloadsEndpoints(): array
    {
        return (new SelfServiceApisData)->downloadApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getApiClass(): string
    {
        return SelfServiceApi::class;
    }
}
