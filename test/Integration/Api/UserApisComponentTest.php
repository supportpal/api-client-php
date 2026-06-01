<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\UserApisData;
use SupportPal\ApiClient\Tests\Integration\ApiComponentTest;

class UserApisComponentTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected static function getGetEndpoints(): array
    {
        return (new UserApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected static function getPostEndpoints(): array
    {
        return (new UserApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected static function getPutEndpoints(): array
    {
        return (new UserApisData)->putApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getDeleteEndpoints(): array
    {
        return (new UserApisData)->deleteApiCalls();
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
     */
    protected function getApiClass(): string
    {
        return UserApi::class;
    }
}
