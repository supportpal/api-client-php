<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait SettingsApis
{
    use ApiClientAware;

    /**
     * @throws HttpResponseException
     */
    public function getSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_SETTINGS, []);
    }
}
