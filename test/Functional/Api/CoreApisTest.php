<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\CoreApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class CoreApisTest extends ApiComponentTest
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
     * @throws Exception
     */
    protected function getApi(): Api
    {
        return $this->supportPal->getCoreApi();
    }
}
