<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\OrganisationCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationCustomFieldData;

class OrganisationCustomFieldApisTest extends BaseUserApiTest
{
    public function testGetOrganisationCustomFields(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new OrganisationCustomFieldData)->getAllResponse(),
            OrganisationCustomField::class
        );

        $this->apiClient
            ->getOrganisationCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $customFields = $this->api->getOrganisationCustomFields();
        self::assertEquals($output, $customFields);
    }

    public function testGetOrganisationCustomField(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new OrganisationCustomFieldData)->getResponse(),
            OrganisationCustomField::class
        );

        $this->apiClient
            ->getOrganisationCustomField(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customField = $this->api->getOrganisationCustomField(1);
        self::assertEquals($output, $customField);
    }
}
