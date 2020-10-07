<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;

class ChannelSettingsFactory extends BaseModelFactory
{
    public function getModel(): string
    {
        return ChannelSettings::class;
    }
}
