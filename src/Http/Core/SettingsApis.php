<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait SettingsApis
{
    use ApiClientAware;

    /**
     * This method sends an http request to fetch coreSettings
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_SETTINGS, []);
    }
}
