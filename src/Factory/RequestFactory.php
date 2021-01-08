<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

use function array_merge;
use function base64_encode;
use function http_build_query;

/**
 * Class RequestFactory
 * @package SupportPal\ApiClient\Factory
 */
class RequestFactory
{
    /**
     * Base API URL.
     * @var string
     */
    private $apiUrl;

    /**
     * Token used to authenticate with SupportPal
     * @var string
     */
    private $apiToken;

    /**
     * API supported content type.
     * @var string
     */
    private $contentType;

    /** @var string */
    private $formatType;

    /** @var EncoderInterface */
    private $encoder;

    /** @var array<mixed> */
    private $defaultParameters;

    /**
     * RequestFactory constructor.
     * @param string $apiUrl
     * @param string $apiToken
     * @param string $contentType
     * @param string $formatType
     * @param EncoderInterface $encoder
     * @param array<mixed> $defaultParameters Parameters that are always appended to the result request
     */
    public function __construct(
        string $apiUrl,
        string $apiToken,
        string $contentType,
        string $formatType,
        EncoderInterface $encoder,
        array $defaultParameters = []
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
        $this->contentType = $contentType;
        $this->formatType = $formatType;
        $this->encoder = $encoder;
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

        // Merge query and body data together.
        $data = array_merge($this->defaultParameters, $queryParameters, $body);

        $body = ! empty($data) ? Utils::streamFor($this->encoder->encode($data, $this->formatType)) : null;

        $uri = new Uri($this->apiUrl . $endpoint);

        return new Request(
            $method,
            $uri->withQuery(http_build_query($data)),
            $headers,
            $body
        );
    }
}
