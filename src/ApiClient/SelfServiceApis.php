<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Contains all ApiClient calls to SelfService Apis
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\ApiClient
 */
trait SelfServiceApis
{
    use ApiClientAware;

    /**
     *
     * This method posts a self service comment
     * @param string $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postSelfServiceComment(string $body): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
            'POST',
            ApiDictionary::SELF_SERVICE_COMMENT,
            [],
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getComments(array $queryParameters): ResponseInterface
    {
        return $this->sendGetRequest(ApiDictionary::SELF_SERVICE_COMMENT, $queryParameters);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getArticleTypes(array $queryParameters): ResponseInterface
    {
        return $this->sendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParameters);
    }

    /**
     * @param int $articleId
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getArticle(int $articleId, array $queryParameters): ResponseInterface
    {
        return $this->sendGetRequest(
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' .  $articleId,
            $queryParameters
        );
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getArticlesByTerm(array $queryParameters): ResponseInterface
    {
        return $this->sendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParameters);
    }

    /**
     * @param int $categoryId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSelfServiceCategory(int $categoryId): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $categoryId
        );

        return $this->sendRequest($request);
    }

    /**
     * @param int $tagId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSelfServiceTag(int $tagId): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
            'GET',
            ApiDictionary::SELF_SERVICE_TAG . '/' . $tagId
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSelfServiceCategories(array $queryParameters): ResponseInterface
    {
        return $this->sendGetRequest(ApiDictionary::SELF_SERVICE_CATEGORY, $queryParameters);
    }

    /**
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getSelfServiceSettings(): ResponseInterface
    {
        $request = $this->getRequestFactory()->create('GET', ApiDictionary::SELF_SERVICE_SETTINGS);

        return $this->sendRequest($request);
    }
}
