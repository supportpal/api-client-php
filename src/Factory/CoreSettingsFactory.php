<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\CoreSettings;

/**
 * Class CoreSettingsFactory
 * @package SupportPal\ApiClient\Factory
 */
class CoreSettingsFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return CoreSettings::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CoreSettings::class;
    }
}
