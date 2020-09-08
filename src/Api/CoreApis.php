<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\CoreSettings;

trait CoreApis
{

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * This method fetches all core settings
     * @return CoreSettings
     * @throws \SupportPal\ApiClient\Exception\HttpResponseException
     */
    public function getCoreSettings(): CoreSettings
    {
        $response = $this->apiClient->getCoreSettings();
        $body = json_decode((string) $response->getBody(), true)['data'];
        /** @var CoreSettings $model */
        $model = $this->modelCollectionFactory->create(CoreSettings::class, $body);

        return $model;
    }
}
