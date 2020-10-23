<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\SelfServiceApisData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class SelfServiceApisTest extends ApiTestCase
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
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getApiClass(): string
    {
        return SelfServiceApi::class;
    }
}
