<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use Kevinrob\GuzzleCache\KeyValueHttpHeader;
use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use Kevinrob\GuzzleCache\Strategy\Delegate\DelegatingCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\NullCacheStrategy;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\ChainAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CacheStrategyConfigurator
{
    public function __construct(private ApiCacheMap $apiCacheMap)
    {
        //
    }

    /**
     * This function sets the cache strategy used in the application.
     * By default, endpoints will not be cached unless specified per path, per method.
     * We also use two types of cache, ArrayCache, and FileSystem cache sorted from faster to slower.
     * We always use a greedy strategy (ignore headers returned by the server)
     *
     * read more @https://github.com/Kevinrob/guzzle-cache-middleware
     * @param string $cacheDir
     * @param string $baseApiPath
     * @return CacheStrategyInterface
     */
    public function buildCacheStrategy(string $cacheDir, string $baseApiPath): CacheStrategyInterface
    {
        $delegatingCacheStrategy = new DelegatingCacheStrategy(new NullCacheStrategy);
        /**
         * For every set of Apis, clustered by a default TTL, we create a cache storage.
         */
        foreach ($this->apiCacheMap->getCacheableApis($baseApiPath) as $ttl => $apis) {
            $cacheStorage = new SymfonyCacheStorage(new ChainAdapter([new ArrayAdapter, new FilesystemAdapter($cacheDir)]));
            $cacheStrategy = new GreedyCacheStrategy($cacheStorage, $ttl, new KeyValueHttpHeader(['Authorization']));
            /**
             * request matcher handlers linking the caching strategy to every specific endpoint
             */
            $delegatingCacheStrategy->registerRequestMatcher(new CacheableRequestMatcher($apis), $cacheStrategy);
        }

        return $delegatingCacheStrategy;
    }
}
