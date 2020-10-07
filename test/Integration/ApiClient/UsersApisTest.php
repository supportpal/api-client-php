<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class UsersApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
class UsersApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getUsers' => [UserData::GET_USERS_SUCCESSFUL_RESPONSE, [[]]],
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
