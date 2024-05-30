<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\UserApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class UserApisTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new UserApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPostEndpoints(): array
    {
        return (new UserApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPutEndpoints(): array
    {
        return (new UserApisData)->putApiCalls();
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
        return $this->supportPal->getUserApi();
    }
}
