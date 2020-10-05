<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\CoreApis;
use SupportPal\ApiClient\ApiClient\SelfServiceApis;
use SupportPal\ApiClient\ApiClient\UserApis;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

/**
 * This class includes all the API calls
 * Class ApiClient
 * @package SupportPal\ApiClient
 */
class ApiClient
{
    use CoreApis;
    use SelfServiceApis;
    use UserApis;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * @var string
     */
    private $formatType;

    /**
     * ApiClient constructor.
     * @param ClientInterface $httpClient
     * @param RequestFactory $requestFactory
     * @param DecoderInterface $decoder
     * @param string $formatType
     */
    public function __construct(
        ClientInterface $httpClient,
        RequestFactory $requestFactory,
        DecoderInterface $decoder,
        string $formatType
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->decoder = $decoder;
        $this->formatType = $formatType;
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            $response = $this->getHttpClient()->sendRequest($request);
            $this->assertRequestSuccessful($response);
        } catch (ClientExceptionInterface $exception) {
            throw new HttpResponseException;
        }

        return $response;
    }

    /**
     * @param string $endpoint
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    protected function prepareAndSendGetRequest(string $endpoint, array $queryParameters): ResponseInterface
    {
        $request = $this->getRequestFactory()->create('GET', $endpoint, [], [], $queryParameters);

        return $this->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    protected function assertRequestSuccessful(ResponseInterface $response): void
    {
        $body = $this->decoder->decode((string) $response->getBody(), $this->formatType);
        if ($response->getStatusCode() !== 200
            || ! is_array($body)
            || ! isset($body['status'])
            || $body['status'] === 'error'
        ) {
            throw new HttpResponseException($body['message'] ?? '');
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
