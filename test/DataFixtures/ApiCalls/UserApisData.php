<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
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
            'getUserCustomFields' => [$customFieldsData->getAllResponse(), []],
            'getUserCustomField' => [$customFieldsData->getResponse(), [1]],
            'getUserGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getUserGroup' => [$userGroupData->getResponse(), [1]]
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createUser = (new CreateUser)->fill(CreateUserData::DATA);
        $userData = (new UserData)->getResponse();

        return [
            'postUser' => [$createUser, $userData],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $userData = new UserData;

        return [
            'updateUser' => [$userData->getFilledInstance(), $userData->getArrayData(), $userData->getResponse()],
        ];
    }
}
