<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class TagApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\TagApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class TagApisTest extends ApiClientTest
{
    /** @var SelfServiceApiClient */
    protected $apiClient;

    /** @var int */
    private $testTagId = 1;

    public function testGetTag(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_TAG . '/' . $this->testTagId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TagData)->getResponse()),
            $request
        );

        $getTagTypeSuccessfulResponse = $this->apiClient->getTag($this->testTagId);
        self::assertSame($response->reveal(), $getTagTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTag(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_TAG . '/' . $this->testTagId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getTag($this->testTagId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTag(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_TAG . '/' . $this->testTagId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTag($this->testTagId);
    }

    public function testGetTags(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_TAG, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TagData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getTags($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTags(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_TAG, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getTags($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTags(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_TAG, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTags($queryParams);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
