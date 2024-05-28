<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class AttachmentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\Attachments
 * @covers \SupportPal\ApiClient\Api\Api
 */
class AttachmentApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    public function testGetAttachments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new AttachmentData)->getAllResponse(),
            Attachment::class
        );

        $this
            ->apiClient
            ->getAttachments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketAttachments = $this->api->getAttachments();
        self::assertEquals($expectedOutput, $ticketAttachments);
    }

    public function testGetAttachment(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new AttachmentData)->getResponse(),
            Attachment::class
        );

        $this
            ->apiClient
            ->getAttachment(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketAttachment = $this->api->getAttachment(1);
        self::assertEquals($expectedOutput, $ticketAttachment);
    }

    public function testDownloadAttachment(): void
    {
        $response = $this->prophesize(ResponseInterface::class);
        $stream = $this->prophesize(StreamInterface::class);
        $response->getBody()->shouldBeCalled()->willReturn($stream->reveal());
        $this->apiClient->downloadAttachment(1)->shouldBeCalled()->willReturn($response->reveal());

        $this->api->downloadAttachment(new Attachment(['id' => 1]));
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return TicketApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
