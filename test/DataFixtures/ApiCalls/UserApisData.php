<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class UserApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
    {
        $userData = new UserData;
        $customFieldsData = new UserCustomFieldData;
        $userGroupData = new GroupData;

        return [
            'getUsers' => [$userData->getAllResponse(), []],
            'getUser' => [$userData->getResponse(), [1]],
            'getCustomFields' => [$customFieldsData->getAllResponse(), []],
            'getCustomField' => [$customFieldsData->getResponse(), [1]],
            'getGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getGroup' => [$userGroupData->getResponse(), [1]]
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createUser = new CreateUserData;

        return [
            'createUser' => [$createUser->getFilledInstance(), $createUser->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateUser = new UpdateUserData;

        return [
            'updateUser' => [1, $updateUser->getFilledInstance(), $updateUser->getResponse()],
        ];
    }
}
