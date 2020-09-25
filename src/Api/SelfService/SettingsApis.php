<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\SelfService\Settings;

trait SettingsApis
{
    use ApiAware;

    /**
     * @return Settings
     * @throws HttpResponseException
     */
    public function getSelfServiceSettings(): Settings
    {
        $response = $this->getApiClient()->getSelfServiceSettings();
        /** @var Settings $model */
        $model = $this->getModelCollectionFactory()->create(Settings::class, $this->decodeBody($response));

        return $model;
    }
}
