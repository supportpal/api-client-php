<?php


namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CreateMessageData extends BaseModelData
{

    public const DATA = [
        'ticket_id' => 1,
        'user_id' => 'test',
        'user_ip_address' => '',
        'message_type' => 1,
        'text' => 'test',
        'cc' => [],
        'is_draft' => 0,
        'send_user_email' => 0,
        'send_operators_email' => 1,
        'attachment' => [],
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateMessage::class;
    }
}
