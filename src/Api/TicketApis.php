<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Ticket\AttachmentApis;
use SupportPal\ApiClient\Api\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\Api\Ticket\CustomFieldApis;
use SupportPal\ApiClient\Api\Ticket\DepartmentApis;
use SupportPal\ApiClient\Api\Ticket\PriorityApis;
use SupportPal\ApiClient\Api\Ticket\SettingsApis;
use SupportPal\ApiClient\Api\Ticket\StatusApis;

/**
 * Contains all ApiCalls pre and post processing that falls under Tickets Module
 * @package SupportPal\ApiClient\Api
 */
trait TicketApis
{
    use AttachmentApis;
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use PriorityApis;
    use SettingsApis;
    use StatusApis;
}
