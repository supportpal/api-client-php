<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Core;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class CoreApisTest extends ApiClientTest
{
    /** @var CoreClient */
    protected $apiClient;

    public function testSuccessfulGetCoreSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new SettingsData)->getResponse()),
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
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getSettings();
    }

    public function testHttpExceptionGetCoreSettings(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::CORE_SETTINGS, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getSettings();
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return CoreClient::class;
    }
}
