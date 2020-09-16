<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

trait CoreApisTestCase
{

    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testSuccessfulGetCoreSettings(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($this->coreSettingsSuccessfulResponse);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $coreSettings = $this->getSupportPal()->getApi()->getCoreSettings();
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
        self::expectExceptionMessage((string) json_decode((string) $response->getBody(), true)['message']);
        $this->getSupportPal()->getApi()->getCoreSettings();
    }

    /**
     * @return iterable<array<string, Response>>
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;

    abstract protected function appendRequestResponse(Response $response): void;

    abstract protected function getSupportPal(): SupportPal;
}
