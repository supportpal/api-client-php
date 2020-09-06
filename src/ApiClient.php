<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\APIDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

/**
 * This class includes all the API calls
 * Class ApiClient
 * @package SupportPal\ApiClient
 */
class ApiClient
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
     * This method sends an http request to fetch coreSettings
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCoreSettings(): ResponseInterface
    {
        $request = $this->requestFactory->create('GET', APIDictionary::CORE_SETTINGS);
        try {
            $response = $this->httpClient->sendRequest($request);
            $this->assertRequestSuccessful($response);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpResponseException;
        }

        return $response;
    }

    /**
     *
     * This method posts a self service comment
     * @param string $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postSelfServiceComment(string $body): ResponseInterface
    {
        $request = $this->requestFactory->create(
            'POST',
            APIDictionary::SELF_SERVICE_COMMENT,
            [],
            $body
        );

        try {
            $response = $this->httpClient->sendRequest($request);
            $this->assertRequestSuccessful($response);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpResponseException;
        }

        return $response;
    }

    /**
     * This method asserts that the request returned a successful response
     * @param ResponseInterface $response
     * @throws HttpResponseException
     */
    private function assertRequestSuccessful(ResponseInterface $response): void
    {
        $body = json_decode((string) $response->getBody(), true);
        if ($response->getStatusCode() !== 200
            || ! is_array($body)
            || ! isset($body['status'])
            || $body['status'] === 'error'
        ) {
            throw new HttpResponseException($body['status'] ?? '');
        }
    }
}
