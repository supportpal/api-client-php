<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CreateTicketData extends BaseModelData
{
    public const DATA = [
        'user' => 1,
        'on_behalf_of' => 1,
        'user_firstname' => 'test',
        'user_lastname' => 'test',
        'user_email' => 'test',
        'user_organisation' => '1',
        'user_ip_address' => '111',
        'department' => 1,
        'brand' => 2,
        'status' => 1,
        'priority' => 1,
        'internal' => 1,
        'subject' => 'test',
        'text' => 'test',
        'tag' => [1],
        'assignedto' => [1],
        'watching' => [1],
        'customfield' => [1],
        'cc' => ['test'],
        'send_user_email' => 1,
        'send_operators_email' => 1,
        'attachment' => [],
        'created_at' => 1,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateTicket::class;
    }
}
