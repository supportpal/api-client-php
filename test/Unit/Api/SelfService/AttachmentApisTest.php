<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Model\SelfService\Attachment;
use SupportPal\ApiClient\Model\SelfService\Request\CreateAttachment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateAttachmentData;

class AttachmentApisTest extends BaseSelfServiceApiTest
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

        $this->api->downloadAttachment(new Attachment(['id' => 1]));
    }

    public function testCreateAttachment(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new AttachmentData)->getResponse(), Attachment::class);

        $createAttachment = new CreateAttachmentData;
        /** @var CreateAttachment $data */
        $data = $createAttachment->getFilledInstance();

        $this->apiClient
            ->postAttachment($createAttachment::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->createAttachment($data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testDeleteAttachment(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteAttachment(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteAttachment(1);
        self::assertTrue($apiResponse);
    }
}
