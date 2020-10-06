<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait SettingsApis
{
    use ApiClientAware;

    /**
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_SETTINGS, []);
    }
}
