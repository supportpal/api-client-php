<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\Language;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class LanguageData extends BaseModelData
{
    public const DATA = [
        'id'                => 1,
        'name'              => 'English',
        'code'              => 'en',
        'enabled'           => 1,
        'upgrade_available' => 0,
        'version'           => '1.0',
        'created_at'        => 1600753870,
        'updated_at'        => 1600753870,
        'formatted_name'    => 'English',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Language::class;
    }
}
