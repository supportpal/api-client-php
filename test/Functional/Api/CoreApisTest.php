<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

class CoreApisTest extends ContainerAwareBaseTestCase
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testSuccessfulGetCoreSettings(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this
            ->getEncoder()
            ->encode($this->coreSettingsSuccessfulResponse, $this->getFormatType());
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
        self::expectExceptionMessage(
            (string) $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['message']
        );
        $this->getSupportPal()->getApi()->getCoreSettings();
    }
}
