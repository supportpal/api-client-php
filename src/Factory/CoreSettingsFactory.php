<?php


namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\CoreSettings;

class CoreSettingsFactory extends BaseModelFactory implements ModelFactory
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
