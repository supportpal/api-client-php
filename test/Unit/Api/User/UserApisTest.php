<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class UserApisTest extends ApiTest
{
    /** @var UserApi */
    protected $api;

    public function testGetUsers(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new UserData)->getAllResponse(),
            User::class
        );

        $this
            ->apiClient
            ->getUsers([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $users = $this->api->getUsers([]);
        self::assertEquals($expectedOutput, $users);
    }

    public function testGetUser(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new UserData)->getResponse(),
            User::class
        );

        $this
            ->apiClient
            ->getUser(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $user = $this->api->getUser(1);
        self::assertEquals($expectedOutput, $user);
    }

    public function testPostUser(): void
    {
        $userData = new UserData;
        $createUserData = new CreateUserData;
        $arrayData = $createUserData::DATA;
        [$response, $userOutput] = $this->postCommonExpectations(
            $userData->getResponse(),
            User::class
        );

        $this
            ->apiClient
            ->postUser($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $user = $this->api->postUser(new CreateUser($arrayData));
        self::assertEquals($userOutput, $user);
    }

    public function testPutUser(): void
    {
        $userData = new UserData;

        [$response, $output] = $this->postCommonExpectations(
            $userData->getResponse(),
            User::class,
        );

        $this
            ->apiClient
            ->updateUser(self::TEST_ID, $userData->getArrayData())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $user = $this->api->updateUser(new User(['id' => self::TEST_ID]), $userData->getArrayData());
        self::assertEquals($output, $user);
    }

    public function testPutUserWithoutIdentifier(): void
    {
        $userData = new UserData;
        $input = $this->prophesize(User::class);
        $input->getAttribute('relations')->willReturn(null);
        $input->hasGetMutator('id')->willReturn(false);
        $input->hasGetMutator('relations')->willReturn(false);
        self::expectException(MissingIdentifierException::class);
        /** @var User $user */
        $user = $input->reveal();
        $this->api->updateUser($user, $userData->getArrayData());
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return UserApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
