<?php


namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiTest;

class UsersApisTest extends ApiTest
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
