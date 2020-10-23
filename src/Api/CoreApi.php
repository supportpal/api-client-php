<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Api\Core\BrandApis;
use SupportPal\ApiClient\Api\Core\SettingsApis;
use SupportPal\ApiClient\ApiClient\CoreApiClient;

/**
 * Contains all ApiCalls pre and post processing that falls under Core Module
 * Trait CoreApis
 * @package SupportPal\ApiClient\Api
 */
class CoreApi extends Api
{
    use BrandApis;
    use SettingsApis;

    /** @var CoreApiClient */
    protected $apiClient;

    /**
     * @return CoreApiClient
     */
    protected function getApiClient(): CoreApiClient
    {
        return $this->apiClient;
    }
}
