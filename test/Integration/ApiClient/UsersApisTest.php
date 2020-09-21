<?php


namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class UsersApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getUsers' => UserData::GET_USER_SUCCESSFUL_RESPONSE,
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
