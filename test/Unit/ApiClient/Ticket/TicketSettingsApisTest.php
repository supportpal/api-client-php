<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class TicketSettingsApis
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\SettingsApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class TicketSettingsApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $ticketSettingsSuccessfulResponse = SettingsData::SUCCESSFUL_GET_RESPONSE;

    public function testSuccessfulGetTicketSettings(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->ticketSettingsSuccessfulResponse),
            $request
        );

        $ticketSettingsResponse = $this->apiClient->getTicketSettings();
        self::assertSame($response->reveal(), $ticketSettingsResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketSettings(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketSettings();
    }

    public function testHttpExceptionGetTicketSettings(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_SETTINGS, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketSettings();
    }
}
