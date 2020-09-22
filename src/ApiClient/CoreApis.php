<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Contains all ApiClient calls to Core Apis
 * Trait CoreApis
 * @package SupportPal\ApiClient\ApiClient
 */
trait CoreApis
{
    use ApiClientAware;

    /**
     * This method sends an http request to fetch coreSettings
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCoreSettings(): ResponseInterface
    {
        $request = $this->getRequestFactory()->create('GET', ApiDictionary::CORE_SETTINGS);

        return $this->sendRequest($request);
    }
}
