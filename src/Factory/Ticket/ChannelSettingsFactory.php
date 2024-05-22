<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;

/**
 * Class ChannelSettingsFactory
 * @package SupportPal\ApiClient\Factory\Ticket
 */
class ChannelSettingsFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return ChannelSettings::class;
    }
}
