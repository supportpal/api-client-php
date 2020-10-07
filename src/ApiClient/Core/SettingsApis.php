<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait SettingsApis
{
    use ApiClientAware;

    /**
     * This method sends an http request to fetch coreSettings
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCoreSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_SETTINGS, []);
    }
}
