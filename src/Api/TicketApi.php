<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Api\Ticket\AttachmentApis;
use SupportPal\ApiClient\Api\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\Api\Ticket\CustomFieldApis;
use SupportPal\ApiClient\Api\Ticket\DepartmentApis;
use SupportPal\ApiClient\Api\Ticket\MessageApis;
use SupportPal\ApiClient\Api\Ticket\PriorityApis;
use SupportPal\ApiClient\Api\Ticket\SettingsApis;
use SupportPal\ApiClient\Api\Ticket\StatusApis;
use SupportPal\ApiClient\Api\Ticket\TicketApis;
use SupportPal\ApiClient\ApiClient\TicketApiClient;

/**
 * Contains all ApiCalls pre and post processing that falls under Tickets Module
 * @package SupportPal\ApiClient\Api
 */
class TicketApi extends Api
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

    /** @var TicketApiClient */
    protected $apiClient;

    /**
     * @return TicketApiClient
     */
    protected function getApiClient(): TicketApiClient
    {
        return $this->apiClient;
    }
}
