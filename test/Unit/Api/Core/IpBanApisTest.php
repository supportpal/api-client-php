<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Core\IpBan;
use SupportPal\ApiClient\Model\Core\Request\CreateIpBan;
use SupportPal\ApiClient\Model\Core\Request\UpdateIpBan;
use SupportPal\ApiClient\Tests\DataFixtures\Core\IpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateIpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateIpBanData;

class IpBanApisTest extends BaseCoreApiTest
{
    public function testGetIpBans(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new IpBanData)->getAllResponse(),
            IpBan::class
        );

        $this->apiClient
            ->getIpBans([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrands = $this->api->getIpBans([]);
        self::assertEquals($output, $returnedBrands);
    }

    public function testGetIpBan(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new IpBanData)->getResponse(),
            IpBan::class
        );

        $this->apiClient
            ->getIpBan(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->getIpBan(1);
        self::assertEquals($output, $returnedBrand);
    }

    public function testCreateIpBan(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new IpBanData)->getResponse(),
            IpBan::class
        );

        $createIpBan = new CreateIpBanData;
        /** @var CreateIpBan $data */
        $data = $createIpBan->getFilledInstance();

        $this->apiClient
            ->postIpBan($createIpBan::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->createIpBan($data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testUpdateIpBan(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new IpBanData)->getResponse(),
            IpBan::class
        );

        $updateIpBan = new UpdateIpBanData;
        /** @var UpdateIpBan $data */
        $data = $updateIpBan->getFilledInstance();

        $this->apiClient
            ->putIpBan(1, $updateIpBan::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->updateIpBan(1, $data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testDeleteIpBan(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteIpBan(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteIpBan(1);
        self::assertTrue($apiResponse);
    }
}
