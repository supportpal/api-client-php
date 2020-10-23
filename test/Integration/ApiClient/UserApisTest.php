<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class UsersApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
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
            'getUserCustomFields' => [$customFieldsData->getAllResponse(), [[]]],
            'getUserCustomField' => [$customFieldsData->getResponse(), [1]],
            'getUserGroups' => [$userGroupData->getAllResponse(), [[]]],
            'getUserGroup' => [$userGroupData->getResponse(), [1]]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        $userData = (new UserData)->getResponse();

        return [
            'postUser' => [CreateUserData::DATA, $userData],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        $userData = new UserData;

        return [
            'updateUser' => [$userData->getArrayData(), $userData->getResponse()],
        ];
    }
}
