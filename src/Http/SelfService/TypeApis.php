<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait TypeApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTypes(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParameters);
    }

    /**
     * @param int $typeId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getType(int $typeId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE . '/' .  $typeId,
            []
        );
    }
}
