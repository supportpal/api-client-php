<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait SettingsApis
{
    use ApiClientAware;

    /**
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSettings(): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_SETTINGS, []);
    }
}
