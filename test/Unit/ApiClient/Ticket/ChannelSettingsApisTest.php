<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;
use function sprintf;

class ChannelSettingsApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

    private const TEST_CHANNEL = 'web';

    public function testSuccessfulGetChannelSettings(): void
    {
        $request = $this
            ->requestCommonExpectations(
                'GET',
                sprintf(ApiDictionary::TICKET_CHANNEL_SETTINGS, self::TEST_CHANNEL),
                [],
                []
            );
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new ChannelSettingsData)->getResponse()),
            $request
        );

        $ticketSettingsResponse = $this->apiClient->getChannelSettings(self::TEST_CHANNEL);
        self::assertSame($response->reveal(), $ticketSettingsResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetChannelSettings(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this
            ->requestCommonExpectations(
                'GET',
                sprintf(ApiDictionary::TICKET_CHANNEL_SETTINGS, self::TEST_CHANNEL),
                [],
                []
            );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getChannelSettings(self::TEST_CHANNEL);
    }

    public function testHttpExceptionGetChannelSettings(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this
            ->requestCommonExpectations(
                'GET',
                sprintf(ApiDictionary::TICKET_CHANNEL_SETTINGS, self::TEST_CHANNEL),
                [],
                []
            );

        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getChannelSettings(self::TEST_CHANNEL);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
