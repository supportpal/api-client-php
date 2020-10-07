<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait SettingsApis, includes all api calls related to self service settings
 * @package SupportPal\ApiClient\ApiClient\SelfService
 */
trait SettingsApis
{
    use ApiClientAware;

    /**
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSelfServiceSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_SETTINGS, []);
    }
}
