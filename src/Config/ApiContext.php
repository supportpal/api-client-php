<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Config;

use function sprintf;
use function trim;

class ApiContext
{
    private const BASE_API_PATH = 'api/';

    /** @var string */
    private $host;

    /** @var string */
    private $apiToken;

    /** @var string */
    private $scheme = 'https';

    /** @var int */
    private $port = 443;

    /** @var string */
    private $path = '';

    /**
     * ApiContext constructor.
     * @param string $host
     * @param string $apiToken
     */
    public function __construct(string $host, string $apiToken)
    {
        $this->host = $host;
        $this->apiToken = $apiToken;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return sprintf(
            '%s://%s:%d/%s/',
            $this->trim($this->scheme),
            $this->trim($this->host),
            $this->port,
            $this->trim($this->getApiPath())
        );
    }

    /**
     * @return string
     */
    public function getApiPath(): string
    {
        return '/' . $this->trim(sprintf('/%s/%s', $this->trim($this->path), self::BASE_API_PATH)) . '/';
    }

    /**
     * Use a secure connection over SSL/TLS.
     *
     * @return $this
     */
    public function enableSsl(): self
    {
        $this->setScheme('https');
        $this->setPort(443);

        return $this;
    }

    /**
     * Use an in-secure connection to the API.
     *
     * @return $this
     */
    public function disableSsl(): self
    {
        $this->setScheme('http');
        $this->setPort(80);

        return $this;
    }

    /**
     * @param string $scheme
     * @return self
     */
    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @param int $port
     * @return self
     */
    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @param string $path
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param string $str
     * @return string
     */
    private function trim(string $str): string
    {
        return trim($str, '/');
    }
}
