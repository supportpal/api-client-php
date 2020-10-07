<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Core;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CoreApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testSuccessfulGetCoreSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->coreSettingsSuccessfulResponse),
            $request
        );

        $coreSettingsResponse = $this->apiClient->getCoreSettings();
        self::assertSame($response->reveal(), $coreSettingsResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCoreSettings(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCoreSettings();
    }

    public function testHttpExceptionGetCoreSettings(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCoreSettings();
    }
}
