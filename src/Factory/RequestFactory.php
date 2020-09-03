<?php


namespace SupportPal\ApiClient\Factory;

use GuzzleHttp\Psr7\Request;
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

    public function __construct(string $apiUrl, string $apiToken)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array<mixed> $headers
     * @param string|null $body
     * @return RequestInterface
     */
    public function create(
        string $method,
        string $uri,
        array $headers = [],
        ?string $body = null
    ): RequestInterface {
        $headers['Authorization'] = 'Basic ' . base64_encode($this->apiToken . ':X');
        return new Request($method, $this->apiUrl . $uri, $headers, $body);
    }
}
