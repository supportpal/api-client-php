<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use function sprintf;
use function trim;

class ApiContext
{
    private const BASE_API_PATH = 'api/';

    /** @var string */
    private $host;

    /** @var string */
    private $scheme;

    /** @var int */
    private $port;

    /** @var string */
    private $path;

    /**
     * ApiContext constructor.
     * @param string $host
     * @param string $scheme
     * @param int $port
     * @param string $path
     */
    public function __construct(string $host, string $path = '', string $scheme = 'https', int $port = 443)
    {
        $this->host = $host;
        $this->scheme = $scheme;
        $this->port = $port;
        $this->path = $path;
    }

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

    public function getApiPath(): string
    {
        return sprintf('/%s/%s', $this->trim($this->path), self::BASE_API_PATH);
    }

    private function trim(string $str): string
    {
        return trim($str, '/');
    }
}
