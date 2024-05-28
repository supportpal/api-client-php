<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class UserGroupApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\User
 * @covers \SupportPal\ApiClient\Api\User\UserGroups
 * @covers \SupportPal\ApiClient\Api\Api
 */
class UserGroupApisTest extends ApiTest
{
    /** @var UserApi */
    protected $api;

    public function testGetUserGroups(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new GroupData)->getAllResponse(),
            Group::class
        );

        $this
            ->apiClient
            ->getGroups([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $userGroups = $this->api->getGroups([]);
        self::assertEquals($expectedOutput, $userGroups);
    }

    public function testGetUserCustomField(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new GroupData)->getResponse(),
            Group::class
        );

        $this
            ->apiClient
            ->getGroup(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $userGroup = $this->api->getGroup(1);
        self::assertEquals($expectedOutput, $userGroup);
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
