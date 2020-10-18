<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Shared;

use SupportPal\ApiClient\Model\Shared\OptionTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class OptionTranslationData extends BaseModelData
{
    public const DATA = [
        'ticket_custom_field_option_id' => 4,
        'value' => 'test',
        'locale' => 'ar'
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return OptionTranslation::class;
    }
}
