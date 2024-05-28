<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;
use function sprintf;

/**
 * Class AttachmentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\Http\Ticket\AttachmentApis
 * @covers \SupportPal\ApiClient\Http\Client
 */
class AttachmentApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

    /** @var int */
    private $testAttachmentId = 1;

    public function testGetAttachments(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_ATTACHMENT, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new AttachmentData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getAttachments($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetAttachments(): void
    {
        self::expectException(HttpResponseException::class);
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_ATTACHMENT, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getAttachments($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetAttachments(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_ATTACHMENT, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getAttachments($queryParams);
    }

    public function testGetAttachment(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_ATTACHMENT . '/' . $this->testAttachmentId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new AttachmentData)->getResponse()),
            $request
        );

        $getAttachmentTypeSuccessfulResponse = $this->apiClient->getAttachment($this->testAttachmentId);
        self::assertSame($response->reveal(), $getAttachmentTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetAttachment(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_ATTACHMENT . '/' . $this->testAttachmentId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getAttachment($this->testAttachmentId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetAttachment(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_ATTACHMENT . '/' . $this->testAttachmentId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getAttachment($this->testAttachmentId);
    }

    public function testSuccessfulDownloadAttachment(): void
    {
        $request = $this->prophesize(Request::class);
         $this->requestFactory
             ->create('GET', sprintf(ApiDictionary::TICKET_ATTACHMENT_DOWNLOAD, 1))
             ->shouldBeCalled()
             ->willReturn($request->reveal());
        $response = $this->prophesize(ResponseInterface::class);
        $response->getHeader('Content-Disposition')->shouldBeCalled()->willReturn(['test']);
        $this->httpClient->sendRequest($request->reveal())->shouldBeCalled()->willReturn($response->reveal());
        self::assertSame($response->reveal(), $this->apiClient->downloadAttachment(1));
    }

    public function testSuccessfulDownloadAttachmentClientException(): void
    {
        $request = $this->prophesize(Request::class);
        $this->requestFactory
            ->create('GET', sprintf(ApiDictionary::TICKET_ATTACHMENT_DOWNLOAD, 1))
            ->shouldBeCalled()
            ->willReturn($request->reveal());

        $this->throwClientExceptionCommonExpectations($request);
        self::expectException(HttpResponseException::class);
        $this->apiClient->downloadAttachment(1);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
