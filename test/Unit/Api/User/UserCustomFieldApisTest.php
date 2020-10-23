<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class UserCustomFieldApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\User
 * @covers \SupportPal\ApiClient\Api\User\CustomFieldApis
 * @covers \SupportPal\ApiClient\Api
 */
class UserCustomFieldApisTest extends ApiTest
{
    public function testGetUserCustomFields(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getAllResponse(),
            UserCustomField::class
        );

        $this
            ->apiClient
            ->getUserCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $customFields = $this->api->getUserCustomFields([]);
        self::assertSame($expectedOutput, $customFields);
    }

    public function testGetUserCustomField(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getResponse(),
            UserCustomField::class
        );

        $this
            ->apiClient
            ->getUserCustomField(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customField = $this->api->getUserCustomField(1);
        self::assertSame($expectedOutput, $customField);
    }
}
