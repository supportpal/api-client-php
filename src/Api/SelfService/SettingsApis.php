<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Shared\Settings;

/**
 * Trait SettingsApis, includes all related ApiCalls pre and post processing to selfservice settings
 * @package SupportPal\ApiClient\Api\SelfService
 */
trait SettingsApis
{
    use ApiAware;

    /**
     * @return Settings
     * @throws HttpResponseException
     */
    public function getSettings(): Settings
    {
        $response = $this->getApiClient()->getSettings();
        /** @var Settings $model */
        $model = $this->getModelCollectionFactory()->create(Settings::class, $this->decodeBody($response)['data']);

        return $model;
    }

    abstract protected function getApiClient(): SelfServiceApiClient;
}
