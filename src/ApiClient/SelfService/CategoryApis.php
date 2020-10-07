<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait CategoryApis, includes all api calls related to category
 * @package SupportPal\ApiClient\ApiClient\SelfService
 */
trait CategoryApis
{
    use ApiClientAware;

    /**
     * @param int $categoryId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCategory(int $categoryId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $categoryId, []);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getCategories(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_CATEGORY, $queryParameters);
    }
}
