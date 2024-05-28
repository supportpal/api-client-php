<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

use function sprintf;

trait ChannelSettingsApis
{
    use ApiClientAware;

    /**
     * @param string $channel
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getChannelSettings(string $channel): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(sprintf(ApiDictionary::TICKET_CHANNEL_SETTINGS, $channel), []);
    }
}
