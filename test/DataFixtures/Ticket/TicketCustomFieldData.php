<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Shared\OptionData;

class TicketCustomFieldData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'Related Product/Service',
        'description' => 'Please select an option if this ticket is related to one of your products/services.',
        'type' => 5,
        'depends_on_field_id' => null,
        'depends_on_option_id' => null,
        'order' => 0,
        'required' => 0,
        'public' => 1,
        'encrypted' => 0,
        'purge' => 0,
        'locked' => 0,
        'regex' => null,
        'regex_error_message' => null,
        'created_at' => 1598621911,
        'updated_at' => 1598621911,
        'options' => [OptionData::DATA,],
        'brands' => [BrandData::DATA,],
        'departments' => [DepartmentData::DATA,],
        'translations' => [TicketCustomFieldTranslationData::DATA,],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['options'] = [OptionData::getFilledInstance(),];
        $data['brands'] = [BrandData::getFilledInstance(),];
        $data['departments'] = [DepartmentData::getFilledInstance(),];
        $data['translations'] = [TicketCustomFieldTranslationData::getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return TicketCustomField::class;
    }
}
