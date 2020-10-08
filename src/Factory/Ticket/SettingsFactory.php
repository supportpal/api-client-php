<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Ticket\Settings;

/**
 * Class SettingsFactory
 * @package SupportPal\ApiClient\Factory\Ticket
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
