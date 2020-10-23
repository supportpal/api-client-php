<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\ApiClient\UserApiClient;
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
    /** @var UserApi */
    protected $api;

    public function testGetUserCustomFields(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new UserCustomFieldData)->getAllResponse(),
            UserCustomField::class
        );

        $this
            ->apiClient
            ->getCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $customFields = $this->api->getCustomFields([]);
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
            ->getCustomField(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customField = $this->api->getCustomField(1);
        self::assertSame($expectedOutput, $customField);
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
