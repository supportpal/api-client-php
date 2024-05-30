<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Ticket\Attachments;
use SupportPal\ApiClient\Api\Ticket\ChannelSettings;
use SupportPal\ApiClient\Api\Ticket\CustomFields;
use SupportPal\ApiClient\Api\Ticket\Departments;
use SupportPal\ApiClient\Api\Ticket\Messages;
use SupportPal\ApiClient\Api\Ticket\Priorities;
use SupportPal\ApiClient\Api\Ticket\Settings;
use SupportPal\ApiClient\Api\Ticket\Statuses;
use SupportPal\ApiClient\Api\Ticket\Tickets;
use SupportPal\ApiClient\Http\TicketClient;

class TicketApi extends Api
{
    use Attachments;
    use ChannelSettings;
    use CustomFields;
    use Departments;
    use Priorities;
    use Messages;
    use Settings;
    use Statuses;
    use Tickets;

    public function __construct(protected readonly TicketClient $apiClient)
    {
    }

    protected function getApiClient(): TicketClient
    {
        return $this->apiClient;
    }
}
