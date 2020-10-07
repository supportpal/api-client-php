<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Core;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Core\CoreSettings;

/**
 * Class CoreSettingsFactory
 * @package SupportPal\ApiClient\Factory
 */
class CoreSettingsFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CoreSettings::class;
    }
}
