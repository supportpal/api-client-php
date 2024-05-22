<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;

use function array_merge;
use function base64_encode;
use function http_build_query;
use function json_encode;

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
     * token used to authenticate with SupportPal
     * @var string
     */
    private $apiToken;

    /**
     * Api supported content type
     * @var string
     */
    private $contentType;

    /** @var array<mixed> */
    private $defaultParameters;

    /** @var array<mixed> */
    private $defaultBodyContent;

    /**
     * RequestFactory constructor.
     * @param string $apiUrl
     * @param string $apiToken
     * @param string $contentType
     * @param array<mixed> $defaultBodyContent Body content that are always passed in the body of the result request
     * @param array<mixed> $defaultParameters Parameters that are always appended to the result request
     */
    public function __construct(
        string $apiUrl,
        string $apiToken,
        string $contentType,
        array $defaultBodyContent = [],
        array $defaultParameters = []
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
        $this->contentType = $contentType;
        $this->defaultBodyContent = $defaultBodyContent;
        $this->defaultParameters = $defaultParameters;
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array<mixed> $headers
     * @param array<mixed> $body
     * @param array<mixed> $queryParameters
     * @return RequestInterface
     */
    public function create(
        string $method,
        string $endpoint,
        array $headers = [],
        array $body = [],
        array $queryParameters = []
    ): RequestInterface {
        $headers['Content-Type'] = $headers['Content-Type'] ?? $this->contentType;
        $headers['Authorization'] = $headers['Authorization'] ?? 'Basic ' . base64_encode($this->apiToken . ':X');
        $bodyArray = array_merge($this->defaultBodyContent, $body);

        $body = ! empty($bodyArray) ? Utils::streamFor(json_encode($bodyArray)) : null;

        $uri = new Uri($this->apiUrl . $endpoint);

        return new Request(
            $method,
            $uri->withQuery(http_build_query(array_merge($this->defaultParameters, $queryParameters))),
            $headers,
            $body
        );
    }
}
