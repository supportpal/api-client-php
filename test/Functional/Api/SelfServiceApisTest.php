<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\SelfServiceApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class SelfServiceApisTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new SelfServiceApisData)->getApiCalls();
    }

    /**
     * @return mixed[]
     * @throws InvalidArgumentException
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
        return [];
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function getApi(): Api
    {
        return $this->supportPal->getSelfServiceApi();
    }
}
