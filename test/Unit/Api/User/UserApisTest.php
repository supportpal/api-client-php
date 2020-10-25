<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class UserApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api
 * @covers \SupportPal\ApiClient\Api\UserApi
 * @covers \SupportPal\ApiClient\Api\Api
 */
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
        self::assertSame($expectedOutput, $users);
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
        self::assertSame($expectedOutput, $user);
    }

    public function testPostUser(): void
    {
        $userData = new UserData;
        $createUserData = new CreateUserData;
        $arrayData = $createUserData::DATA;
        [$response, $userMock, $userOutput] = $this->postCommonExpectations(
            $userData->getResponse(),
            $arrayData,
            CreateUser::class,
            User::class
        );

        $this
            ->apiClient
            ->postUser($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $user = $this->api->postUser($userMock);
        $this->assertSame($userOutput->reveal(), $user);
    }

    public function testPostWithIncompleteData(): void
    {
        /** @var CreateUser $user */
        $user = $this->postIncompleteDataCommonExpectations(CreateUser::class);
        $this->expectException(InvalidArgumentException::class);
        $this->api->postUser($user);
    }

    public function testPutUser(): void
    {
        $userData = new UserData;

        [$response, $inputMock, $output] = $this->putCommonExpectations(
            User::class,
            $userData->getResponse()
        );

        $this
            ->apiClient
            ->updateUser(self::TEST_ID, $userData->getArrayData())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $user = $this->api->updateUser($inputMock, $userData->getArrayData());
        $this->assertSame($output->reveal(), $user);
    }

    public function testPutUserWithoutIdentifier(): void
    {
        $userData = new UserData;
        $input = $this->prophesize(User::class);
        $input->getId()->willReturn(null)->shouldBeCalled();
        $this->expectException(MissingIdentifierException::class);
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
        return UserApiClient::class;
    }
}
