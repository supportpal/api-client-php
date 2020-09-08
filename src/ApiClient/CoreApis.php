<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

trait CoreApis
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * This method sends an http request to fetch coreSettings
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCoreSettings(): ResponseInterface
    {
        $request = $this->requestFactory->create('GET', ApiDictionary::CORE_SETTINGS);
        return $this->sendRequest($request);
    }

    abstract public function sendRequest(RequestInterface $request): ResponseInterface;

    abstract protected function assertRequestSuccessful(ResponseInterface $response): void;
}
