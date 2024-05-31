<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;

class UserCustomFieldApisTest extends BaseUserApiTest
{
    public function testGetCustomFields(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getAllResponse(),
            UserCustomField::class
        );

        $this->apiClient
            ->getCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $customFields = $this->api->getCustomFields([]);
        self::assertEquals($output, $customFields);
    }

    public function testGetCustomField(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getResponse(),
            UserCustomField::class
        );

        $this->apiClient
            ->getCustomField(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customField = $this->api->getCustomField(1);
        self::assertEquals($output, $customField);
    }
}
