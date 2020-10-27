<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

class RequestDefaults
{
    public const DEFAULT_OPTIONS = [
        self::CONNECT_TIMEOUT => 60,
        self::TIMEOUT => 60,
        self::VERIFY => true,
    ];

    /**
     * Number of seconds to wait before timing out the connection while trying to connect to the server
     */
    public const CONNECT_TIMEOUT = 'connect_timeout';

    /**
     * Set to true enable SSL certificate verification
     */
    public const VERIFY = 'verify';

    /**
     * Number of seconds before timing out the request
     */
    public const TIMEOUT = 'timeout';

    /** @var array<mixed> */
    private $defaultParameters;

    /** @var array<mixed> */
    private $defaultBodyContent;

    /** @var array<mixed> */
    private $defaultRequestOptions;

    /**
     * RequestDefaults constructor.
     * @param array<mixed> $defaultParameters
     * @param array<mixed> $defaultBodyContent
     * @param array<mixed> $defaultRequestOptions
     */
    public function __construct(
        array $defaultParameters = [],
        array $defaultBodyContent = [],
        array $defaultRequestOptions = self::DEFAULT_OPTIONS
    ) {
        $this->defaultParameters = $defaultParameters;
        $this->defaultBodyContent = $defaultBodyContent;
        $this->defaultRequestOptions = $defaultRequestOptions;
    }

    /**
     * @return array<mixed>
     */
    public function getDefaultParameters(): array
    {
        return $this->defaultParameters;
    }

    /**
     * @return array<mixed>
     */
    public function getDefaultBodyContent(): array
    {
        return $this->defaultBodyContent;
    }

    /**
     * @return array<mixed>
     */
    public function getDefaultRequestOptions(): array
    {
        return $this->defaultRequestOptions;
    }
}
