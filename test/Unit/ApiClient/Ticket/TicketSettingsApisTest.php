<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class TicketSettingsApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

    public function testSuccessfulGetTicketSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new SettingsData)->getResponse()),
            $request
        );

        $ticketSettingsResponse = $this->apiClient->getSettings();
        self::assertSame($response->reveal(), $ticketSettingsResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketSettings(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getSettings();
    }

    public function testHttpExceptionGetTicketSettings(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getSettings();
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
