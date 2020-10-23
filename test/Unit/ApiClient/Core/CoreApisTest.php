<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Core;

use SupportPal\ApiClient\ApiClient\CoreApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient
 * @covers \SupportPal\ApiClient\ApiClient\Core\SettingsApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CoreApisTest extends ApiClientTest
{
    /** @var CoreApiClient */
    protected $apiClient;

    public function testSuccessfulGetCoreSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CoreSettingsData)->getResponse()),
            $request
        );

        $coreSettingsResponse = $this->apiClient->getSettings();
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
        $this->apiClient->getSettings();
    }

    public function testHttpExceptionGetCoreSettings(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getSettings();
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return CoreApiClient::class;
    }
}
