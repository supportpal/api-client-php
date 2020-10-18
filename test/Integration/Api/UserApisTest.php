<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\UserApisData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class UsersApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class UserApisTest extends ApiTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new UserApisData)->getApiCalls();
    }
}
