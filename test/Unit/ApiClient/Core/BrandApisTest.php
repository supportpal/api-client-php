<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Core;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class BrandApisTest extends ApiClientTest
{
    /**
     * @var int
     */
    private $testBrandId = 1;

    public function testGetBrands(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_BRAND, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(BrandData::getAllResponse()),
            $request
        );
        $getBrandsTypeSuccessfulResponse = $this->apiClient->getBrands($queryParams);
        self::assertSame($response->reveal(), $getBrandsTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetBrands(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_BRAND, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getBrands($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetBrands(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_BRAND, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getBrands($queryParams);
    }

    public function testGetBrand(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::CORE_BRAND . '/' . $this->testBrandId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(BrandData::getResponse()),
            $request
        );

        $getBrandTypeSuccessfulResponse = $this->apiClient->getBrand($this->testBrandId);
        self::assertSame($response->reveal(), $getBrandTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetBrand(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::CORE_BRAND . '/' . $this->testBrandId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getBrand($this->testBrandId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetBrand(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::CORE_BRAND . '/' . $this->testBrandId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getBrand($this->testBrandId);
    }
}
