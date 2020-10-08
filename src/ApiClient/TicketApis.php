<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use SupportPal\ApiClient\ApiClient\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\ApiClient\Ticket\CustomFieldApis;
use SupportPal\ApiClient\ApiClient\Ticket\DepartmentApis;
use SupportPal\ApiClient\ApiClient\Ticket\PriorityApis;
use SupportPal\ApiClient\ApiClient\Ticket\SettingsApis;

/**
 *  Contains all ApiClient calls to Tickets module
 * Trait TicketApis
 * @package SupportPal\ApiClient\ApiClient
 */
trait TicketApis
{
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use PriorityApis;
    use SettingsApis;
}
