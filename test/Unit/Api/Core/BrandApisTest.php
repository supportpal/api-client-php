<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class BrandApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Core
 * @covers \SupportPal\ApiClient\Api\Core\BrandApis
 * @covers \SupportPal\ApiClient\Api
 */
class BrandApisTest extends ApiTest
{
    public function testGetBrand(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            BrandData::getResponse(),
            Brand::class
        );

        $this
            ->apiClient
            ->getBrand(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->getBrand(1);
        self::assertSame($expectedOutput, $returnedBrand);
    }

    public function testGetBrands(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            BrandData::getAllResponse(),
            Brand::class
        );

        $this
            ->apiClient
            ->getBrands([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrands = $this->api->getBrands([]);
        self::assertSame($expectedOutput, $returnedBrands);
    }
}
