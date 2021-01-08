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
    private $defaultRequestOptions;

    /**
     * RequestDefaults constructor.
     * @param array<mixed> $defaultParameters
     * @param array<mixed> $defaultRequestOptions
     */
    public function __construct(
        array $defaultParameters = [],
        array $defaultRequestOptions = self::DEFAULT_OPTIONS
    ) {
        $this->defaultParameters = $defaultParameters;
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
     * @deprecated Use getDefaultParameters instead, to be removed in 2.0.0.
     *
     * @return array<mixed>
     */
    public function getDefaultBodyContent(): array
    {
        return $this->defaultParameters;
    }

    /**
     * @return array<mixed>
     */
    public function getDefaultRequestOptions(): array
    {
        return $this->defaultRequestOptions;
    }

    /**
     * @param array<mixed> $defaultParameters
     * @return self
     */
    public function setDefaultParameters(array $defaultParameters): self
    {
        $this->defaultParameters = $defaultParameters;

        return $this;
    }

    /**
     * @deprecated Use setDefaultParameters instead, to be removed in 2.0.0.
     *
     * @param array<mixed> $defaultBodyContent
     * @return self
     */
    public function setDefaultBodyContent(array $defaultBodyContent): self
    {
        $this->defaultParameters = $defaultBodyContent;

        return $this;
    }

    /**
     * @param array<mixed> $defaultRequestOptions
     * @return self
     */
    public function setDefaultRequestOptions(array $defaultRequestOptions): self
    {
        $this->defaultRequestOptions = $defaultRequestOptions;

        return $this;
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
     * Disable SSL certification verification.
     *
     * @return self
     */
    public function disableSslVerification(): self
    {
        return $this->addRequestOption(self::VERIFY, false);
    }

    /**
     * Enable SSL certificate verification.
     *
     * @return $this
     */
    public function enableSslVerification(): self
    {
        return $this->addRequestOption(self::VERIFY, true);
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
