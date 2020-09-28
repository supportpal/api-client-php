<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\CoreSettings;

/**
 * Contains all ApiCalls pre and post processing that falls under Core Module
 * Trait CoreApis
 * @package SupportPal\ApiClient\Api
 */
trait CoreApis
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
