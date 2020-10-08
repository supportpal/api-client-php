<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\Api\Ticket\CustomFieldApis;
use SupportPal\ApiClient\Api\Ticket\DepartmentApis;
use SupportPal\ApiClient\Api\Ticket\SettingsApis;

/**
 * Contains all ApiCalls pre and post processing that falls under Tickets Module
 * @package SupportPal\ApiClient\Api
 */
trait TicketApis
{
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use SettingsApis;
}
