<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Core\Request\CreateWhitelistedIp;
use SupportPal\ApiClient\Model\Core\Request\UpdateWhitelistedIp;
use SupportPal\ApiClient\Model\Core\WhitelistedIp;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateWhitelistedIpData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateWhitelistedIpData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\WhitelistedIpData;

class IpWhitelistApisTest extends BaseCoreApiTest
{
    public function testGetWhitelistedIps(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new WhitelistedIpData)->getAllResponse(),
            WhitelistedIp::class
        );

        $this->apiClient
            ->getWhitelistedIps([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrands = $this->api->getWhitelistedIps();
        self::assertEquals($output, $returnedBrands);
    }

    public function testGetWhitelistedIp(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new WhitelistedIpData)->getResponse(),
            WhitelistedIp::class
        );

        $this->apiClient
            ->getWhitelistedIp(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->getWhitelistedIp(1);
        self::assertEquals($output, $returnedBrand);
    }

    public function testCreateWhitelistedIp(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new WhitelistedIpData)->getResponse(),
            WhitelistedIp::class
        );

        $createWhitelistedIp = new CreateWhitelistedIpData;
        /** @var CreateWhitelistedIp $data */
        $data = $createWhitelistedIp->getFilledInstance();

        $this->apiClient
            ->postWhitelistedIp($createWhitelistedIp::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->createWhitelistedIp($data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testUpdateWhitelistedIp(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new WhitelistedIpData)->getResponse(),
            WhitelistedIp::class
        );

        $updateWhitelistedIp = new UpdateWhitelistedIpData;
        /** @var UpdateWhitelistedIp $data */
        $data = $updateWhitelistedIp->getFilledInstance();

        $this->apiClient
            ->putWhitelistedIp(1, $updateWhitelistedIp::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->updateWhitelistedIp(1, $data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testDeleteWhitelistedIp(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteWhitelistedIp(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteWhitelistedIp(1);
        self::assertTrue($apiResponse);
    }
}
