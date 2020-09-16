<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\CoreApis;
use SupportPal\ApiClient\ApiClient\SelfServiceApis;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

/**
 * This class includes all the API calls
 * Class ApiClient
 * @package SupportPal\ApiClient
 */
class ApiClient
{
    use CoreApis;
    use SelfServiceApis;
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
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
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
    protected function assertRequestSuccessful(ResponseInterface $response): void
    {
        $body = json_decode((string) $response->getBody(), true);
        if ($response->getStatusCode() !== 200
            || ! is_array($body)
            || ! isset($body['status'])
            || $body['status'] === 'error'
        ) {
            throw new HttpResponseException($body['message'] ?? '');
        }
    }
}
