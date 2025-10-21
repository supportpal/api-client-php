<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Organisation;
use SupportPal\ApiClient\Model\User\Request\CreateOrganisation;
use SupportPal\ApiClient\Model\User\Request\UpdateOrganisation;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateOrganisationData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateOrganisationData;
use SupportPal\ApiClient\Tests\Unit\Api\User\BaseUserApiTest;

class OrganisationApisTest extends BaseUserApiTest
{
    public function testGetOrganisations(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new OrganisationData)->getAllResponse(), Organisation::class);

        $this->apiClient
            ->getOrganisations([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $operators = $this->api->getOrganisations();
        self::assertEquals($output, $operators);
    }

    public function testGetOrganisation(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new OrganisationData)->getResponse(), Organisation::class);

        $this->apiClient
            ->getOrganisation(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $operator = $this->api->getOrganisation(1);
        self::assertEquals($output, $operator);
    }

    public function testCreateOrganisation(): void
    {
        $operatorData = new OrganisationData;
        $createOrganisationData = new CreateOrganisationData;
        $arrayData = $createOrganisationData::DATA;
        [$operatorOutput, $response] = $this->makeCommonExpectations($operatorData->getResponse(), Organisation::class);

        $this->apiClient
            ->postOrganisation($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $operator = $this->api->createOrganisation(new CreateOrganisation($arrayData));
        self::assertEquals($operatorOutput, $operator);
    }

    public function testUpdateOrganisation(): void
    {
        $operatorData = new OrganisationData;
        $updateOrganisation = new UpdateOrganisation(UpdateOrganisationData::DATA);

        [$output, $response] = $this->makeCommonExpectations($operatorData->getResponse(), Organisation::class);

        $this->apiClient
            ->putOrganisation(self::TEST_ID, $updateOrganisation->toArray())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $operator = $this->api->updateOrganisation(self::TEST_ID, $updateOrganisation);
        self::assertEquals($output, $operator);
    }

    public function testDeleteOrganisation(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteOrganisation(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteOrganisation(1);
        self::assertTrue($apiResponse);
    }
}
