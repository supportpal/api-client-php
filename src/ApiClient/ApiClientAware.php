<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

/**
 * Contains all required method definitions and attribute dependencies in ApiClient traits
 * Trait ApiClientAware
 * @package SupportPal\ApiClient\ApiClient
 */
trait ApiClientAware
{
    /**
     * @return ClientInterface
     */
    abstract protected function getHttpClient(): ClientInterface;

    /**
     * @return RequestFactory
     */
    abstract protected function getRequestFactory(): RequestFactory;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    abstract public function sendRequest(RequestInterface $request): ResponseInterface;

    /**
     * This method asserts that the request returned a successful response
     * @param ResponseInterface $response
     * @throws HttpResponseException
     */
    abstract protected function assertRequestSuccessful(ResponseInterface $response): void;

    /**
     * @param string $endpoint
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    abstract protected function prepareAndSendGetRequest(string $endpoint, array $queryParameters): ResponseInterface;
}
