<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class TicketData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'number' => '6151997',
        'department_id' => 1,
        'department_email_id' => 1,
        'brand_id' => 1,
        'channel_id' => 1,
        'user_id' => 2,
        'status_id' => 1,
        'priority_id' => 1,
        'sla_plan_id' => null,
        'subject' => 'test',
        'due_time' => null,
        'paused_time' => null,
        'time_while_paused' => 0,
        'resolved_time' => null,
        'reopened_time' => null,
        'cc' => [],
        'locked' => 0,
        'merged' => 0,
        'internal' => 0,
        'response_email_sent' => 0,
        'messages_count' => 3,
        'notes_count' => 0,
        'has_attachments' => 0,
        'has_draft' => false,
        'last_reply_time' => 1598534452,
        'last_message_time' => 1598529793,
        'last_reply_id' => 60,
        'last_message_id' => 58,
        'last_reply_by' => 0,
        'last_message_by' => 0,
        'created_at' => 1597247676,
        'updated_at' => 1598534607,
        'deleted_at' => null,
        'token' => 'e0f5cc66dfdbccb13f6930b8085ee65a26265a11',
        'department' => DepartmentData::DATA,
        'brand' => BrandData::DATA,
        'channel' => ChannelData::DATA,
        'user' => UserData::DATA,
        'status' => StatusData::DATA,
        'priority' => PriorityData::DATA,
        'slaplan' => SlaPlanData::DATA,
        'customfields' => [CustomFieldData::DATA,],
        'last_reply' => MessageData::DATA,
        'tags' => [TagData::DATA,],
        'assigned' => [OperatorData::DATA,],
        'watching' => [OperatorData::DATA,]
    ];

    /**
     * @inheritDoc
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['department'] = DepartmentData::getFilledInstance();
        $data['brand'] = BrandData::getFilledInstance();
        $data['channel'] = ChannelData::getFilledInstance();
        $data['user'] = UserData::getFilledInstance();
        $data['status'] = StatusData::getFilledInstance();
        $data['priority'] = PriorityData::getFilledInstance();
        $data['slaplan'] = SlaPlanData::getFilledInstance();
        $data['customfields'] = [CustomFieldData::getFilledInstance(),];
        $data['last_reply'] = MessageData::getFilledInstance();
        $data['tags'] = [TagData::getFilledInstance(),];
        $data['assigned'] = [OperatorData::getFilledInstance(),];
        $data['watching'] = [OperatorData::getFilledInstance(),];

        return $data;
    }

    public static function getModel(): string
    {
        return Ticket::class;
    }
}
