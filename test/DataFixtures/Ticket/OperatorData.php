<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\BaseUserData;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;

class OperatorData extends BaseModelData
{
    public const DATA = BaseUserData::DATA + [
        'groups' => [GroupData::DATA,],
        'pivot' => [
            'department_id' => 1,
            'user_id' => 1
        ]
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['groups'] = [(new GroupData)->getFilledInstance()];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Operator::class;
    }
}
