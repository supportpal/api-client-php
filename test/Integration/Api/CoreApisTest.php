<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\CoreApisData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class CoreApisTest extends ApiTestCase
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
}
