<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class TypeApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\TypeApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class TypeApisTest extends ApiClientTest
{
    public function testGetTypes(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(TypeData::getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getTypes($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTypes(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTypes($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTypes(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTypes($queryParams);
    }
}
