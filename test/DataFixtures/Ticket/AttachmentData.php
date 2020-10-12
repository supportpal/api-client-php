<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Ticket\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UploadData;

class AttachmentData extends BaseModelData
{
    public const DATA = [
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
        'upload' => UploadData::DATA,
        'ticket' => TicketData::DATA,
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['upload'] = UploadData::getFilledInstance();
        $data['ticket'] = TicketData::getFilledInstance();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Attachment::class;
    }
}
