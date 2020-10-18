<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class UsersApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
class UserApisTest extends ApiClientTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $userData = new UserData;

        return [
            'getUsers' => [$userData->getAllResponse(), [[]]],
        ];
    }
}
