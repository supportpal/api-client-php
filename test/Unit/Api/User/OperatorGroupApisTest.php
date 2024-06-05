<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;

class OperatorGroupApisTest extends BaseUserApiTest
{
    public function testGetOperatorGroups(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getAllResponse(), Group::class);

        $this->apiClient
            ->getOperatorGroups([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $userGroups = $this->api->getOperatorGroups();
        self::assertEquals($output, $userGroups);
    }

    public function testGetOperatorGroup(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new GroupData)->getResponse(), Group::class);

        $this->apiClient
            ->getOperatorGroup(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $userGroup = $this->api->getOperatorGroup(1);
        self::assertEquals($output, $userGroup);
    }
}
