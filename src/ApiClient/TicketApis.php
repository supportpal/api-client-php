<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use SupportPal\ApiClient\ApiClient\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\ApiClient\Ticket\DepartmentApis;
use SupportPal\ApiClient\ApiClient\Ticket\SettingsApis;

trait TicketApis
{
    use DepartmentApis;
    use SettingsApis;
    use ChannelSettingsApis;
}
