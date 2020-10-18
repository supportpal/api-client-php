<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class AttachmentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\AttachmentApis
 * @covers \SupportPal\ApiClient\Api
 */
class AttachmentApisTest extends ApiTest
{
    public function testGetTicketsAttachments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new AttachmentData)->getAllResponse(),
            Attachment::class
        );

        $this
            ->apiClient
            ->getTicketAttachments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsAttachment = $this->api->getTicketAttachments();
        $this->assertSame($expectedOutput, $ticketsAttachment);
    }

    public function testGetTicketsAttachment(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new AttachmentData)->getResponse(),
            Attachment::class
        );

        $this
            ->apiClient
            ->getTicketAttachment(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsAttachment = $this->api->getTicketAttachment(1);
        $this->assertSame($expectedOutput, $ticketsAttachment);
    }
}
