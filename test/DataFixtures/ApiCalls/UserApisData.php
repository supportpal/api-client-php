<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateOperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateOrganisationData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateOperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateOrganisationData;
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
        $operatorData = new OperatorData;
        $organisationData = new OrganisationData;
        $organisationCustomFieldsData = new OrganisationCustomFieldData;
        $userData = new UserData;
        $userCustomFieldsData = new UserCustomFieldData;
        $userGroupData = new GroupData;

        return [
            'getOperators' => [$operatorData->getAllResponse(), []],
            'getOperator' => [$operatorData->getResponse(), [1]],
            'getOrganisations' => [$organisationData->getAllResponse(), []],
            'getOrganisation' => [$organisationData->getResponse(), [1]],
            'getOrganisationCustomFields' => [$organisationCustomFieldsData->getAllResponse(), []],
            'getOrganisationCustomField' => [$organisationCustomFieldsData->getResponse(), [1]],
            'getSettings' => [(new SettingsData)->getResponse(), []],
            'getUsers' => [$userData->getAllResponse(), []],
            'getUser' => [$userData->getResponse(), [1]],
            'getUserCustomFields' => [$userCustomFieldsData->getAllResponse(), []],
            'getUserCustomField' => [$userCustomFieldsData->getResponse(), [1]],
            'getUserGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getUserGroup' => [$userGroupData->getResponse(), [1]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createOrganisation = new CreateOrganisationData;
        $createOperator = new CreateOperatorData;
        $createUser = new CreateUserData;

        return [
            'createOrganisation' => [ $createOrganisation->getFilledInstance(), $createOrganisation->getResponse()],
            'createOperator' => [$createOperator->getFilledInstance(), $createOperator->getResponse()],
            'createUser' => [$createUser->getFilledInstance(), $createUser->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateOrganisation = new UpdateOrganisationData;
        $updateOperator = new UpdateOperatorData;
        $updateUser = new UpdateUserData;

        return [
            'updateOrganisation' => [1, $updateOrganisation->getFilledInstance(), $updateOrganisation->getResponse()],
            'updateOperator' => [1, $updateOperator->getFilledInstance(), $updateOperator->getResponse()],
            'updateUser' => [1, $updateUser->getFilledInstance(), $updateUser->getResponse()],
        ];
    }

    /**
     * @return array<string, int>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteOrganisation' => 1,
            'deleteOperator' => 1,
            'deleteUser' => 1,
        ];
    }
}
