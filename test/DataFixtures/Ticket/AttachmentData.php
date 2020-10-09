<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class AttachmentData
{
    public const ATTACHMENT_DATA = [
        'id' => 1,
        'upload_hash' => '36f4ac8d4a4a867f9f2b4525a5148dcc69649b00',
        'ticket_id' => 18,
        'message_id' => 72,
        'original_name' => 'testupload.txt',
        'created_at' => 1600079603,
        'updated_at' => 1600079603,
        'direct_frontend_url' => 'http =>//localhost =>8080/index.php/tickets/attachment/36f4ac8d4a4a867f9f2b4525a5148dcc69649b00?ticket=0072997&token=92114d7e2d5616cfea9c67b41e6a80bbe4e2cc27',
        'direct_operator_url' => 'http =>//localhost =>8080/index.php/admin/ticket/attachment/36f4ac8d4a4a867f9f2b4525a5148dcc69649b00',
        'frontend_url' => 'localhost/en/tickets/view/0072997?download=36f4ac8d4a4a867f9f2b4525a5148dcc69649b00&token=92114d7e2d5616cfea9c67b41e6a80bbe4e2cc27',
        'operator_url' => 'localhost/en/admin/ticket/view/18?download=36f4ac8d4a4a867f9f2b4525a5148dcc69649b00',
    ];

    const GET_ATTACHMENTS_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 1,
        'data' => [self::ATTACHMENT_DATA]
    ];

    const GET_ATTACHMENT_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::ATTACHMENT_DATA
    ];
}
