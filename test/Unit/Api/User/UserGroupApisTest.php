<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;

class UserGroupApisTest extends BaseUserApiTestCase
{
    public function testGetUserGroups(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getAllResponse(), Group::class);

        $this->apiClient
            ->getUserGroups([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $userGroups = $this->api->getUserGroups();
        self::assertEquals($output, $userGroups);
    }

    public function testGetUserGroup(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getResponse(), Group::class);

        $this->apiClient
            ->getUserGroup(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $userGroup = $this->api->getUserGroup(1);
        self::assertEquals($output, $userGroup);
    }
}
