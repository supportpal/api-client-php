<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class UserApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
    {
        $userData = new UserData;

        return [
            'getUsers' => [$userData->getAllResponse(), []],
        ];
    }
}
