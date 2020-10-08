<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\Settings;

/**
 * Class SettingsFactory
 * @package SupportPal\ApiClient\Factory\SelfService
 */
class SettingsFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Settings::class;
    }
}
