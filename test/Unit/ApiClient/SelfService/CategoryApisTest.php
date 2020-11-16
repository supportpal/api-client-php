<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class CategoryApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\CategoryApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CategoryApisTest extends ApiClientTest
{
    /** @var SelfServiceApiClient */
    protected $apiClient;

    /** @var int */
    private $testCategoryId = 1;

    public function testGetCategories(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CategoryData)->getAllResponse()),
            $request
        );
        $getCategoriesTypeSuccessfulResponse = $this->apiClient->getCategories($queryParams);
        self::assertSame($response->reveal(), $getCategoriesTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetCategories(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getCategories($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCategories(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCategories($queryParams);
    }

    public function testGetCategory(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CategoryData)->getResponse()),
            $request
        );

        $getCategoryTypeSuccessfulResponse = $this->apiClient->getCategory($this->testCategoryId);
        self::assertSame($response->reveal(), $getCategoryTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetCategory(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getCategory($this->testCategoryId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCategory(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCategory($this->testCategoryId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
