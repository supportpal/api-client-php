<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Ticket\SlaPlan;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SlaPlanData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'condition_group_type' => 1,
        'description' => 'test str',
        'created_at' => 12345,
        'order' => 1223,
        'updated_at' => 1234456,
        'all_hours' => 1,
        'name' => 'test',
        'translations' => [SlaPlanTranslationData::DATA,],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['translations'] = [(new SlaPlanTranslationData)->getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return SlaPlan::class;
    }
}
