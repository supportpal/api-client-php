<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait SettingsApis, includes all api calls related to ticket settings
 * @package SupportPal\ApiClient\ApiClient\Ticket
 */
trait SettingsApis
{
    use ApiClientAware;

    /**
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_SETTINGS, []);
    }
}
