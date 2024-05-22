<?php declare(strict_types=1);

namespace SupportPal\ApiClient;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

use function is_array;
use function json_decode;

use const JSON_THROW_ON_ERROR;

/**
 * This class includes all the API calls
 * Class ApiClient
 * @package SupportPal\ApiClient
 */
class ApiClient
{
    use ApiClientAware;

    /** @var ClientInterface */
    private $httpClient;

    /** @var RequestFactory */
    private $requestFactory;

    /**
     * ApiClient constructor.
     * @param ClientInterface $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        ClientInterface $httpClient,
        RequestFactory $requestFactory
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            $response = $this->getHttpClient()->sendRequest($request);
            $this->assertRequestSuccessful($request, $response);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpResponseException($request, null, $exception->getMessage(), 0, $exception);
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    protected function sendDownloadRequest(RequestInterface $request): ResponseInterface
    {
        try {
            $response = $this->getHttpClient()->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpResponseException($request, null, $exception->getMessage(), 0, $exception);
        }

        /**
         * response is not a file, assert a valid response to get the actual API error
         */
        if (empty($response->getHeader('Content-Disposition'))) {
            $this->assertRequestSuccessful($request, $response);
        }

        return $response;
    }

    /**
     * @inheritDoc
     * @param array<mixed> $queryParameters
     */
    protected function prepareAndSendGetRequest(string $endpoint, array $queryParameters): ResponseInterface
    {
        $request = $this->getRequestFactory()->create('GET', $endpoint, [], [], $queryParameters);

        return $this->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    protected function assertRequestSuccessful(RequestInterface $request, ResponseInterface $response): void
    {
        try {
            $body = json_decode((string) $response->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new HttpResponseException(
                $request,
                $response,
                $response->getReasonPhrase(),
                $e->getCode(),
                $e
            );
        }

        if ($response->getStatusCode() !== 200
            || ! is_array($body)
            || ! isset($body['status'])
            || $body['status'] === 'error'
        ) {
            throw new HttpResponseException(
                $request,
                $response,
                $body['message'] ?? ''
            );
        }
    }

    /**
     * @inheritDoc
     */
    protected function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @inheritDoc
     */
    protected function getRequestFactory(): RequestFactory
    {
        return $this->requestFactory;
    }
}
