<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;

class DepartmentData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'Support',
        'description' => 'This is an automatically generated department, please edit me.',
        'order' => 1,
        'parent_id' => null,
        'public' => 1,
        'ticket_number_format' => null,
        'from_name' => null,
        'notify_frontend_ticket' => 1,
        'notify_email_ticket' => 1,
        'notify_operators' => 1,
        'disable_user_email_replies' => 0,
        'registered_only' => 0,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'default_assignedto' => [OperatorData::DATA,],
        'email_templates' => EmailTemplatesData::DATA,
        'emails' => [EmailData::DATA,],
        'groups' => [GroupData::DATA,],
        'operators' => [OperatorData::DATA,]
    ];

    /**
     * @return array<mixed>
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $departmentData = self::DATA;

        $departmentData['email_templates'] = EmailTemplatesData::getFilledInstance();
        $departmentData['emails'] = [EmailData::getFilledInstance(),];
        $departmentData['operators'] = [OperatorData::getFilledInstance(),];
        $departmentData['groups'] = [GroupData::getFilledInstance(),];
        $departmentData['default_assignedto'] = [OperatorData::getFilledInstance(),];

        return $departmentData;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Department::class;
    }
}
