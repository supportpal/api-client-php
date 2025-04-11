<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use Kevinrob\GuzzleCache\Storage\Psr6CacheStorage;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class SymfonyCacheStorage extends Psr6CacheStorage
{
    public function __construct(AdapterInterface $cache)
    {
        parent::__construct($cache);
    }
}
