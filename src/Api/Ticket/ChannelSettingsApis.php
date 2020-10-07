<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;

/**
 * Trait ChannelSettingsApis, includes all related apis to ticket channels
 * @package SupportPal\ApiClient\Api\Ticket
 */
trait ChannelSettingsApis
{
    use ApiAware;

    /**
     * @param string $channel
     * @return ChannelSettings
     * @throws HttpResponseException
     */
    public function getChannelSettings(string $channel): ChannelSettings
    {
        $response = $this->getApiClient()->getChannelSettings($channel);
        /** @var ChannelSettings $model */
        $model = $this
            ->getModelCollectionFactory()
            ->create(ChannelSettings::class, $this->decodeBody($response)['data']);

        return $model;
    }
}
