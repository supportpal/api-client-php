<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class UserApisTest extends ApiClientTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $userData = new UserData;
        $customFieldsData = new UserCustomFieldData;
        $userGroupData = new GroupData;

        return [
            'getUsers' => [$userData->getAllResponse(), [[]]],
            'getUser' => [$userData->getResponse(), [1]],
            'getCustomFields' => [$customFieldsData->getAllResponse(), [[]]],
            'getCustomField' => [$customFieldsData->getResponse(), [1]],
            'getGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getGroup' => [$userGroupData->getResponse(), [1]]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [
            'postUser' => [CreateUserData::DATA, (new UserData)->getResponse()],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return [
            'putUser' => [UpdateUserData::DATA, (new UserData)->getResponse()],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientClass()
    {
        return UserClient::class;
    }
}
