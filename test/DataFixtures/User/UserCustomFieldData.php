<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Shared\OptionData;

class UserCustomFieldData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'test',
        'description' => '<div class="sp-editor-content"><p>Custom</p></div>',
        'purified_description' => '<div class="sp-editor-content"><p>Custom</p></div>',
        'type' => 0,
        'depends_on_field_id' => null,
        'depends_on_option_id' => null,
        'order' => 1,
        'required' => 0,
        'public' => 1,
        'encrypted' => 0,
        'locked' => 0,
        'regex' => '',
        'regex_error_message' => '',
        'created_at' => 1602320456,
        'updated_at' => 1602320456,
        'options' => [OptionData::DATA],
        'brands' => [BrandData::DATA],
        'translations' => [UserCustomFieldTranslationData::DATA],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['options'] = [(new OptionData)->getFilledInstance()];
        $data['brands'] = [(new BrandData)->getFilledInstance()];
        $data['translations'] = [(new UserCustomFieldTranslationData)->getFilledInstance()];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UserCustomField::class;
    }
}
