<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings as ChannelSettingsModel;

trait ChannelSettings
{
    /**
     * @throws HttpResponseException
     */
    public function getChannelSettings(string $channel): ChannelSettingsModel
    {
        $response = $this->getApiClient()->getChannelSettings($channel);

        return new ChannelSettingsModel($this->decodeBody($response)['data']);
    }

    abstract protected function getApiClient(): TicketClient;
}
