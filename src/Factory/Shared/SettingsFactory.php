<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\Shared;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Shared\Settings;

class SettingsFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Settings::class;
    }
}
