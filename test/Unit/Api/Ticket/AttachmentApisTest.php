<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Model\Ticket\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\AttachmentData;

class AttachmentApisTest extends BaseTicketApiTest
{
    public function testGetAttachments(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new AttachmentData)->getAllResponse(), Attachment::class);

        $this->apiClient
            ->getAttachments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketAttachments = $this->api->getAttachments();
        self::assertEquals($output, $ticketAttachments);
    }

    public function testGetAttachment(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new AttachmentData)->getResponse(), Attachment::class);

        $this->apiClient
            ->getAttachment(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketAttachment = $this->api->getAttachment(1);
        self::assertEquals($output, $ticketAttachment);
    }

    public function testDownloadAttachment(): void
    {
        $response = $this->prophesize(ResponseInterface::class);
        $stream = $this->prophesize(StreamInterface::class);
        $response->getBody()->shouldBeCalled()->willReturn($stream->reveal());
        $this->apiClient->downloadAttachment(1)->shouldBeCalled()->willReturn($response->reveal());

        $this->api->downloadAttachment(1);
    }
}
