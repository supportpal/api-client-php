<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Class RequestFactory
 * @package SupportPal\ApiClient\Factory
 */
class RequestFactory
{
    /**
     * base api url
     * @var string
     */
    private $apiUrl;
    /**
     * token used to authenticate with supportpal
     * @var string
     */
    private $apiToken;

    /**
     * Api supported content type
     * @var string
     */
    private $contentType;

    public function __construct(string $apiUrl, string $apiToken, string $contentType)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
        $this->contentType = $contentType;
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array<mixed> $headers
     * @param string|null $body
     * @param array<mixed> $queryParameters
     * @return RequestInterface
     */
    public function create(
        string $method,
        string $endpoint,
        array $headers = [],
        ?string $body = null,
        array $queryParameters = []
    ): RequestInterface {
        $headers['Content-Type'] = $this->contentType;
        $headers['Authorization'] = 'Basic ' . base64_encode($this->apiToken . ':X');

        $uri = new Uri($this->apiUrl . $endpoint);
        return new Request($method, $uri->withQuery(http_build_query($queryParameters)), $headers, $body);
    }
}
