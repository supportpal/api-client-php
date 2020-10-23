<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
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
    /** @var TicketApi */
    protected $api;

    public function testGetsAttachments(): void
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

        $ticketsAttachment = $this->api->getAttachments();
        $this->assertSame($expectedOutput, $ticketsAttachment);
    }

    public function testGetsAttachment(): void
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

        $ticketsAttachment = $this->api->getAttachment(1);
        $this->assertSame($expectedOutput, $ticketsAttachment);
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
        return TicketApiClient::class;
    }
}
