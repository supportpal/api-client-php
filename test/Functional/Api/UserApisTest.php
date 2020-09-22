<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\ApiTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\UserData;

class UserApisTest extends ApiTestCase
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
