<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\UpdateTicket;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;

class UpdateTicketData extends BaseModelData
{
    public const DATA = [
        'brand' => 2,
        'user' => 1,
        'department' => 1,
        'status' => 1,
        'priority' => 1,
        'subject' => 'test',
        'tag' => [1],
        'assignedto' => [1],
        'watching' => [1],
        'link' => [2],
        'unlink' => [3],
        'sla_plan' => 1,
        'reply_due_time' => 1717089459,
        'resolve_due_time' => 1717089459,
        'customfield' => [1],
        'cc' => ['test@test.com'],
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateTicket::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => TicketData::DATA,
        ];
    }
}
