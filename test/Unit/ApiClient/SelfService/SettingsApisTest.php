<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class SettingsApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\Http\SelfService\SettingsApis
 * @covers \SupportPal\ApiClient\Http\Client
 */
class SettingsApisTest extends ApiClientTest
{
    /** @var SelfServiceClient */
    protected $apiClient;

    public function testGetSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new SettingsData)->getResponse()),
            $request
        );

        $getSettingsTypeSuccessfulResponse = $this->apiClient->getSettings();
        self::assertSame($response->reveal(), $getSettingsTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetSettings(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getSettings();
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetSettings(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getSettings();
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceClient::class;
    }
}
