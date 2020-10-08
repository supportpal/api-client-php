<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class UserApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api
 * @covers \SupportPal\ApiClient\Api\UserApis
 * @covers \SupportPal\ApiClient\Api
 */
class UserApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    protected $getUsersSuccessfulResponse = UserData::GET_USERS_SUCCESSFUL_RESPONSE;

    public function testGetUsers(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            UserData::GET_USERS_SUCCESSFUL_RESPONSE,
            User::class
        );

        $this
            ->apiClient
            ->getUsers([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $users = $this->api->getusers([]);
        self::assertSame($expectedOutput, $users);
    }
}
