<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Shared\Settings;

/**
 * Trait SettingsApis, includes all ApiCalls pre and post processing related to core settings
 * @package SupportPal\ApiClient\Api\Core
 */
trait SettingsApis
{
    use ApiAware;

    /**
     * This method fetches all core settings
     * @return Settings
     * @throws HttpResponseException
     */
    public function getCoreSettings(): Settings
    {
        $response = $this->getApiClient()->getCoreSettings();
        /** @var Settings $model */
        $model = $this->getModelCollectionFactory()->create(Settings::class, $this->decodeBody($response)['data']);

        return $model;
    }
}
