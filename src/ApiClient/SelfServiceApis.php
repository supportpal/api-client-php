<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;

trait SelfServiceApis
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     *
     * This method posts a self service comment
     * @param string $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postSelfServiceComment(string $body): ResponseInterface
    {
        $request = $this->requestFactory->create(
            'POST',
            ApiDictionary::SELF_SERVICE_COMMENT,
            [],
            $body
        );

        return $this->sendRequest($request);
    }
    abstract public function sendRequest(RequestInterface $request): ResponseInterface;

    abstract protected function assertRequestSuccessful(ResponseInterface $response): void;
}
