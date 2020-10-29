<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Config;

class RequestDefaults
{
    public const DEFAULT_OPTIONS = [
        self::CONNECT_TIMEOUT => 60.0,
        self::TIMEOUT => 60.0,
        self::VERIFY => true,
    ];

    private const CONNECT_TIMEOUT = 'connect_timeout';

    private const VERIFY = 'verify';

    private const TIMEOUT = 'timeout';

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

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addRequestOption(string $key, $value): self
    {
        $this->defaultRequestOptions[$key] = $value;

        return $this;
    }

    /**
     * Set to true enable SSL certificate verification
     * @return self
     */
    public function disableSsl(): self
    {
        return $this->addRequestOption(self::VERIFY, false);
    }

    /**
     * Number of seconds to wait before timing out the connection while trying to connect to the server
     * @param float $timeout
     * @return self
     */
    public function setConnectTimeout(float $timeout): self
    {
        return $this->addRequestOption(self::CONNECT_TIMEOUT, $timeout);
    }

    /**
     * Number of seconds before timing out the request
     * @param float $timeout
     * @return self
     */
    public function setTimeout(float $timeout): self
    {
        return $this->addRequestOption(self::TIMEOUT, $timeout);
    }
}
