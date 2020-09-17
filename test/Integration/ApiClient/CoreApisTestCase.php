<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Functional\Api\ApiAwareTestCase;

trait CoreApisTestCase
{
    use ApiAwareTestCase;
    
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    /**
     * @var ApiClient
     */
    private $apiClient;

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
        $this->apiClient->getCoreSettings();
    }
    
    /**
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
