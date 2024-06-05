<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateOperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateOperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\SettingsData;
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
        $operatorData = new OperatorData;
        $customFieldsData = new UserCustomFieldData;
        $userGroupData = new GroupData;

        return [
            'getUsers' => [$userData->getAllResponse(), []],
            'getUser' => [$userData->getResponse(), [1]],
            'getOperators' => [$operatorData->getAllResponse(), []],
            'getOperator' => [$operatorData->getResponse(), [1]],
            'getCustomFields' => [$customFieldsData->getAllResponse(), []],
            'getCustomField' => [$customFieldsData->getResponse(), [1]],
            'getGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getGroup' => [$userGroupData->getResponse(), [1]],
            'getSettings' => [(new SettingsData)->getResponse(), []],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createUser = new CreateUserData;
        $createOperator = new CreateOperatorData;

        return [
            'createUser' => [$createUser->getFilledInstance(), $createUser->getResponse()],
            'createOperator' => [$createOperator->getFilledInstance(), $createOperator->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateUser = new UpdateUserData;
        $updateOperator = new UpdateOperatorData;

        return [
            'updateUser' => [1, $updateUser->getFilledInstance(), $updateUser->getResponse()],
            'updateOperator' => [1, $updateOperator->getFilledInstance(), $updateOperator->getResponse()],
        ];
    }

    /**
     * @return array<string, int>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteUser' => 1,
            'deleteOperator' => 1,
        ];
    }
}
