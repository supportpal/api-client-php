<?php declare(strict_types=1);

namespace SupportPal\ApiClient;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\ChainCache;
use Doctrine\Common\Cache\FilesystemCache;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;
use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use Kevinrob\GuzzleCache\Strategy\Delegate\DelegatingCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\NullCacheStrategy;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheableRequestMatcher;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use function rtrim;
use function sys_get_temp_dir;

/**
 * Class SupportPal
 * @package SupportPal\ApiClient
 */
class SupportPal
{
    private const BASE_API_PATH = '/api/';

    /** @var ContainerBuilder */
    private $containerBuilder;

    /**
     * SupportPal constructor.
     * @param string $baseUrl
     * @param string $apiToken
     * @param array<mixed> $defaultParameters Parameters that will always be passed
     * @param array<mixed> $defaultBodyContent Body content that will always be passed
     * @param string|null $cacheDir
     * @throws Exception
     */
    public function __construct(
        string $baseUrl,
        string $apiToken,
        array $defaultParameters = [],
        array $defaultBodyContent = [],
        ?string $cacheDir = null
    ) {
        $apiUrl = $this->buildApiUrl($baseUrl);
        $cacheDir = $cacheDir ?? sys_get_temp_dir();
        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services.yml');
        $containerBuilder->setParameter('apiUrl', $apiUrl);
        $containerBuilder->setParameter('apiToken', $apiToken);
        $containerBuilder->setParameter('defaultParameters', $defaultParameters);
        $containerBuilder->setParameter('defaultBodyContent', $defaultBodyContent);

        $containerBuilder->set(Client::class, $this->getGuzzleClient($cacheDir));
        $containerBuilder->compile();

        $this->containerBuilder = $containerBuilder;
    }

    /**
     * This method returns the api for SupportPal system
     * @return Api
     * @throws Exception
     */
    public function getApi(): Api
    {
        /** @var Api $api */
        $api = $this->containerBuilder->get(Api::class);

        return $api;
    }

    /**
     * @return RequestFactory
     * @throws Exception
     */
    public function getRequestFactory(): RequestFactory
    {
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->containerBuilder->get(RequestFactory::class);

        return $requestFactory;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        /** @var ApiClient $apiClient */
        $apiClient = $this->containerBuilder->get(ApiClient::class);

        return $apiClient->sendRequest($request);
    }

    /**
     * @param string $cacheDir
     * @return ClientInterface
     */
    private function getGuzzleClient(string $cacheDir): ClientInterface
    {
        $stack = HandlerStack::create();
        $stack->push(new CacheMiddleware($this->buildCacheStrategy($cacheDir)));

        return new Client(['handler' => $stack]);
    }

    /**
     * This function sets the cache strategy used in the application.
     * By default, endpoints will not be cached unless specified per path, per method.
     * We also use two types of cache, ArrayCache, and FileSystem cache sorted from faster to slower.
     * We always use a greedy strategy (ignore headers returned by the server)
     *
     * read more @https://github.com/Kevinrob/guzzle-cache-middleware
     * @param string $cacheDir
     * @return CacheStrategyInterface
     */
    private function buildCacheStrategy(string $cacheDir): CacheStrategyInterface
    {
        $delegatingCacheStrategy = new DelegatingCacheStrategy(new NullCacheStrategy);

        $apiCacheMap = new ApiCacheMap;
        /**
         * For every set of Apis, clustered by a default TTL, we create a cache storage.
         */
        foreach ($apiCacheMap->getCacheableApis(self::BASE_API_PATH) as $ttl => $apis) {
            $cacheStorage = new DoctrineCacheStorage(new ChainCache([new ArrayCache, new FilesystemCache($cacheDir)]));
            $cacheStrategy = new GreedyCacheStrategy($cacheStorage, $ttl);
            /**
             * request matcher handlers linking the caching strategy to every specific endpoint
             */
            $delegatingCacheStrategy->registerRequestMatcher(new CacheableRequestMatcher($apis), $cacheStrategy);
        }

        return $delegatingCacheStrategy;
    }

    /**
     * @param string $baseUrl
     * @return string
     */
    private function buildApiUrl(string $baseUrl): string
    {
        return rtrim($baseUrl, '/') . self::BASE_API_PATH;
    }
}
