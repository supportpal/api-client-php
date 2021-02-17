<?php declare(strict_types=1);

namespace SupportPal\ApiClient;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheStrategyConfigurator;
use SupportPal\ApiClient\Config\ApiContext;
use SupportPal\ApiClient\Config\RequestDefaults;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use function array_merge;
use function str_replace;
use function sys_get_temp_dir;

/**
 * Class SupportPal
 * @package SupportPal\ApiClient
 */
class SupportPal
{
    /** @var ContainerBuilder */
    private $containerBuilder;

    /**
     * SupportPal constructor.
     * @param ApiContext $apiContext
     * @param RequestDefaults|null $requestDefaults
     * @param string|null $cacheDir
     * @throws Exception
     */
    public function __construct(
        ApiContext $apiContext,
        ?RequestDefaults $requestDefaults = null,
        ?string $cacheDir = null
    ) {
        $cacheDir = $cacheDir ?? sys_get_temp_dir();
        $requestDefaults = $requestDefaults ?? new RequestDefaults;

        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services.yml');
        $containerBuilder->setParameter('apiUrl', $this->escapeSpecialCharacters($apiContext->getApiUrl()));
        $containerBuilder->setParameter('apiToken', $this->escapeSpecialCharacters($apiContext->getApiToken()));
        $containerBuilder->setParameter('defaultParameters', $requestDefaults->getDefaultParameters());
        $containerBuilder->setParameter('defaultBodyContent', $requestDefaults->getDefaultBodyContent());

        $containerBuilder->set(
            Client::class,
            $this->getGuzzleClient($apiContext, $requestDefaults->getDefaultRequestOptions(), $cacheDir)
        );

        $containerBuilder->compile();

        $this->containerBuilder = $containerBuilder;
    }

    /**
     * This method returns the api for SupportPal system
     * @return TicketApi
     * @throws Exception
     */
    public function getTicketApi(): TicketApi
    {
        /** @var TicketApi $api */
        $api = $this->containerBuilder->get(TicketApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return CoreApi
     * @throws Exception
     */
    public function getCoreApi(): CoreApi
    {
        /** @var CoreApi $api */
        $api = $this->containerBuilder->get(CoreApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return SelfServiceApi
     * @throws Exception
     */
    public function getSelfServiceApi(): SelfServiceApi
    {
        /** @var SelfServiceApi $api */
        $api = $this->containerBuilder->get(SelfServiceApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return UserApi
     * @throws Exception
     */
    public function getUserApi(): UserApi
    {
        /** @var UserApi $api */
        $api = $this->containerBuilder->get(UserApi::class);

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
     * @param ApiContext $apiContext
     * @param array<mixed> $requestDefaults
     * @param string $cacheDir
     * @return ClientInterface
     */
    private function getGuzzleClient(ApiContext $apiContext, array $requestDefaults, string $cacheDir): ClientInterface
    {
        $stack = HandlerStack::create();
        $stack->push(new CacheMiddleware($this->buildCacheStrategy($apiContext, $cacheDir)));

        return new Client(array_merge(['handler' => $stack,], $requestDefaults));
    }

    /**
     * This function sets the cache strategy used in the application.
     * By default, endpoints will not be cached unless specified per path, per method.
     * We also use two types of cache, ArrayCache, and FileSystem cache sorted from faster to slower.
     * We always use a greedy strategy (ignore headers returned by the server)
     *
     * read more @https://github.com/Kevinrob/guzzle-cache-middleware
     * @param ApiContext $apiContext
     * @param string $cacheDir
     * @return CacheStrategyInterface
     */
    private function buildCacheStrategy(ApiContext $apiContext, string $cacheDir): CacheStrategyInterface
    {
        return (new CacheStrategyConfigurator(new ApiCacheMap))
            ->buildCacheStrategy($cacheDir, $apiContext->getApiPath());
    }

    /**
     * This function escapes '%' because Symfony dependency injection uses it to detect the value of the set parameter
     * using the following regex: `%%|%([^%\s]+)%` in the yaml file
     */
    private function escapeSpecialCharacters(string $value): string
    {
        return str_replace('%', '%%', $value);
    }
}
