<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\CoreApisData;
use SupportPal\ApiClient\Tests\Integration\ApiComponentTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class CoreApisComponentTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new CoreApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getDownloadsEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getApiClass(): string
    {
        return CoreApi::class;
    }
}
