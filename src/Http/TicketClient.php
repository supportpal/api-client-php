<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\Ticket\AttachmentApis;
use SupportPal\ApiClient\Http\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\Http\Ticket\CustomFieldApis;
use SupportPal\ApiClient\Http\Ticket\DepartmentApis;
use SupportPal\ApiClient\Http\Ticket\MessageApis;
use SupportPal\ApiClient\Http\Ticket\PriorityApis;
use SupportPal\ApiClient\Http\Ticket\SettingsApis;
use SupportPal\ApiClient\Http\Ticket\StatusApis;
use SupportPal\ApiClient\Http\Ticket\TicketApis;

class TicketClient extends Client
{
    use AttachmentApis;
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use PriorityApis;
    use MessageApis;
    use SettingsApis;
    use StatusApis;
    use TicketApis;
}
