<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient;

use GuzzleHttp\Psr7\Request;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class CoreApisTest extends ApiClientTest
{

    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testSuccessfulGetCoreSettings(): void
    {
        $request = $this->getCoreSettingsRequestExpectations();
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
        $request = $this->getCoreSettingsRequestExpectations();
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCoreSettings();
    }

    public function testHttpExceptionGetCoreSettings(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->getCoreSettingsRequestExpectations();
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCoreSettings();
    }

    /**
     * @return ObjectProphecy
     */
    private function getCoreSettingsRequestExpectations(): ObjectProphecy
    {
        $request = $this->prophesize(Request::class);
        $this->requestFactory
            ->create('GET', ApiDictionary::CORE_SETTINGS)
            ->shouldBeCalled()
            ->willReturn($request->reveal());

        return $request;
    }
}
