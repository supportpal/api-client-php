<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\SelfServiceSettings;

class SelfServiceSettingsFactory extends BaseModelFactory
{

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return SelfServiceSettings::class;
    }
}
