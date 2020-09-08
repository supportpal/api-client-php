<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

trait CoreApisTestCase
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    /**
     * @var Api
     */
    private $api;

    public function testGetCoreSettings(): void
    {
        $this->appendRequestResponse(
            new Response(200, [], (string) json_encode($this->coreSettingsSuccessfulResponse))
        );
        $coreSettings = $this->api->getCoreSettings();
        self::assertInstanceOf(CoreSettings::class, $coreSettings);
        foreach ($this->coreSettingsSuccessfulResponse['data'] as $key => $value) {
            self::assertSame($value, $coreSettings->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetCoreSettings(Response $response): void
    {
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage((string) json_decode((string) $response->getBody(), true)['status']);
        $this->api->getCoreSettings();
    }

    abstract protected function appendRequestResponse(Response $response): void;

    abstract public function provideUnsuccessfulTestCases(): iterable;
}
