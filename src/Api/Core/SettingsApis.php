<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Core\CoreSettings;

trait SettingsApis
{
    use ApiAware;

    /**
     * This method fetches all core settings
     * @return CoreSettings
     * @throws HttpResponseException
     */
    public function getCoreSettings(): CoreSettings
    {
        $response = $this->getApiClient()->getCoreSettings();
        /** @var CoreSettings $model */
        $model = $this->getModelCollectionFactory()->create(CoreSettings::class, $this->decodeBody($response)['data']);

        return $model;
    }
}
