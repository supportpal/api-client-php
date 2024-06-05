<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\User\Operator;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class OperatorData extends BaseModelData
{
    public const DATA = BaseOperatorData::DATA + ['groups' => [GroupData::DATA]];

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
