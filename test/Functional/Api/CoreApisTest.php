<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\CoreApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class CoreApisTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected static function getGetEndpoints(): array
    {
        return (new CoreApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getPostEndpoints(): array
    {
        return (new CoreApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getPutEndpoints(): array
    {
        return (new CoreApisData)->putApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getDeleteEndpoints(): array
    {
        return (new CoreApisData)->deleteApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getDownloadsEndpoints(): array
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
