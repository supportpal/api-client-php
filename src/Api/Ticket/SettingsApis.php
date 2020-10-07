<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Ticket\Settings;

/**
 * Trait SettingsApis, includes all related ApiCalls pre and post processing to ticket settings
 * @package SupportPal\ApiClient\Api\Ticket
 */
trait SettingsApis
{
    use ApiAware;

    /**
     * This method fetches all ticket settings
     * @return Settings
     * @throws HttpResponseException
     */
    public function getTicketSettings(): Settings
    {
        $response = $this->getApiClient()->getTicketSettings();
        /** @var Settings $model */
        $model = $this->getModelCollectionFactory()->create(Settings::class, $this->decodeBody($response)['data']);

        return $model;
    }
}
