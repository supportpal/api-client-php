<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;

class UserGroupApisTest extends BaseUserApiTest
{
    public function testGetUserGroups(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getAllResponse(), Group::class);

        $this->apiClient
            ->getGroups([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $userGroups = $this->api->getGroups();
        self::assertEquals($output, $userGroups);
    }

    public function testGetUserGroup(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getResponse(), Group::class);

        $this->apiClient
            ->getGroup(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $userGroup = $this->api->getGroup(1);
        self::assertEquals($output, $userGroup);
    }
}
