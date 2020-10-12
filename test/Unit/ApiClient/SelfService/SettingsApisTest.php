<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class SettingsApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\SettingsApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class SettingsApisTest extends ApiClientTest
{
    public function testGetSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(SettingsData::getResponse()),
            $request
        );

        $getSettingsTypeSuccessfulResponse = $this->apiClient->getSelfServiceSettings();
        self::assertSame($response->reveal(), $getSettingsTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetSettings(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getSelfServiceSettings();
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetSettings(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getSelfServiceSettings();
    }
}
