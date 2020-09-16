<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SupportPal
{

    /**
     * @var ContainerBuilder
     */
    private $containerBuilder;

    public function __construct(string $apiUrl, string $apiToken)
    {
        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services.yml');
        $containerBuilder->setParameter('apiUrl', $apiUrl);
        $containerBuilder->setParameter('apiToken', $apiToken);
        $containerBuilder->compile();

        $this->containerBuilder = $containerBuilder;
    }

    /**
     * This method returns the api for SupportPal system
     * @return Api
     * @throws \Exception
     */
    public function getApi(): Api
    {
        /** @var Api $api */
        $api = $this->containerBuilder->get(Api::class);
        return $api;
    }

    /**
     * @return RequestFactory
     * @throws \Exception
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
     * @throws Exception\HttpResponseException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        /** @var ApiClient $apiClient */
        $apiClient = $this->containerBuilder->get(ApiClient::class);
        return $apiClient->sendRequest($request);
    }
}
