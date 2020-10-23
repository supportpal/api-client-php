<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class UserGroupApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\User
 * @covers \SupportPal\ApiClient\Api\User\UserGroupApis
 * @covers \SupportPal\ApiClient\Api
 */
class UserGroupApisTest extends ApiTest
{
    public function testGetUserGroups(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new GroupData)->getAllResponse(),
            Group::class
        );

        $this
            ->apiClient
            ->getUserGroups([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $userGroups = $this->api->getUserGroups([]);
        self::assertSame($expectedOutput, $userGroups);
    }

    public function testGetUserCustomField(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new GroupData)->getResponse(),
            Group::class
        );

        $this
            ->apiClient
            ->getUserGroup(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $userGroup = $this->api->getUserGroup(1);
        self::assertSame($expectedOutput, $userGroup);
    }
}
