<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;

class UserCustomFieldApisTest extends BaseUserApiTest
{
    public function testGetUserCustomFields(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getAllResponse(),
            UserCustomField::class
        );

        $this->apiClient
            ->getUserCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $customFields = $this->api->getUserCustomFields();
        self::assertEquals($output, $customFields);
    }

    public function testGetUserCustomField(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getResponse(),
            UserCustomField::class
        );

        $this->apiClient
            ->getUserCustomField(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customField = $this->api->getUserCustomField(1);
        self::assertEquals($output, $customField);
    }
}
