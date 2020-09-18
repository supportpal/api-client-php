<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient;

use GuzzleHttp\Psr7\Request;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
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
        $response = $this->getCoreSettingsResponseExpectations(
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
        $this->getCoreSettingsResponseExpectations($statusCode, $responseBody, $request);
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

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @param ObjectProphecy $request
     * @return ObjectProphecy
     */
    private function getCoreSettingsResponseExpectations(
        int $statusCode,
        string $responseBody,
        ObjectProphecy $request
    ): ObjectProphecy {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn($statusCode);
        $response->getBody()->willReturn($responseBody);
        $this->httpClient->sendRequest($request->reveal())->shouldBeCalled()->willReturn($response->reveal());
        $this
            ->decoder
            ->decode($responseBody, $this->formatType)
            ->shouldBeCalled()
            ->willReturn(json_decode($responseBody, true));

        return $response;
    }
}
