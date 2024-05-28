<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait ApiClientAware
{
    /**
     * @return ClientInterface
     */
    abstract protected function getHttpClient(): ClientInterface;

    /**
     * @return Request
     */
    abstract protected function getRequest(): Request;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    abstract public function sendRequest(RequestInterface $request): ResponseInterface;

    /**
     * This method asserts that the request returned a successful response
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @throws HttpResponseException
     */
    abstract protected function assertRequestSuccessful(RequestInterface $request, ResponseInterface $response): void;

    /**
     * @param string $endpoint
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    abstract protected function prepareAndSendGetRequest(string $endpoint, array $queryParameters): ResponseInterface;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    abstract protected function sendDownloadRequest(RequestInterface $request): ResponseInterface;
}
