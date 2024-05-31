<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;

class BrandApisTest extends BaseCoreApiTest
{
    public function testGetBrands(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new BrandData)->getAllResponse(), Brand::class);

        $this->apiClient
            ->getBrands([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrands = $this->api->getBrands([]);
        self::assertEquals($output, $returnedBrands);
    }

    public function testGetBrand(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new BrandData)->getResponse(), Brand::class);

        $this->apiClient
            ->getBrand(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->getBrand(1);
        self::assertEquals($output, $returnedBrand);
    }
}
