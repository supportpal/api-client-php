<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class CoreApisTest extends ApiClientTest
{

    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;


    public function testGetCoreSettings(): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($this->coreSettingsSuccessfulResponse, $this->getFormatType())
            )
        );
        $response = $this->apiClient->getCoreSettings();
        self::assertInstanceOf(Response::class, $response);
        self::assertSame(
            $this->coreSettingsSuccessfulResponse,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }
}
