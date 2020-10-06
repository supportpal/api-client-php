<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Ticket\DepartmentApis;
use SupportPal\ApiClient\Api\Ticket\SettingsApis;

trait TicketApis
{
    use DepartmentApis;
    use SettingsApis;
}
