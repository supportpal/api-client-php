<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class UserApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class UserApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getUsers' => [UserData::GET_USERS_SUCCESSFUL_RESPONSE, []],
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
