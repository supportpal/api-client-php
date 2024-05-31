<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\Request\UpdateUser;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class UserApisTest extends BaseUserApiTest
{
    public function testGetUsers(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new UserData)->getAllResponse(), User::class);

        $this->apiClient
            ->getUsers([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $users = $this->api->getUsers();
        self::assertEquals($output, $users);
    }

    public function testGetUser(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new UserData)->getResponse(), User::class);

        $this->apiClient
            ->getUser(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $user = $this->api->getUser(1);
        self::assertEquals($output, $user);
    }

    public function testCreateUser(): void
    {
        $userData = new UserData;
        $createUserData = new CreateUserData;
        $arrayData = $createUserData::DATA;
        [$userOutput, $response] = $this->makeCommonExpectations($userData->getResponse(), User::class);

        $this->apiClient
            ->postUser($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $user = $this->api->createUser(new CreateUser($arrayData));
        self::assertEquals($userOutput, $user);
    }

    public function testUpdateUser(): void
    {
        $userData = new UserData;
        $updateUser = new UpdateUser(UpdateUserData::DATA);

        [$output, $response] = $this->makeCommonExpectations($userData->getResponse(), User::class);

        $this->apiClient
            ->putUser(self::TEST_ID, $updateUser->toArray())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $user = $this->api->updateUser(self::TEST_ID, $updateUser);
        self::assertEquals($output, $user);
    }
}
