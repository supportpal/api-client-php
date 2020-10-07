<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait ArticleApis, includes all api calls related to article apis
 * @package SupportPal\ApiClient\ApiClient\SelfService
 */
trait ArticleApis
{
    use ApiClientAware;

    /**
     * @param int $articleId
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getArticle(int $articleId, array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
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
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParameters);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getArticles(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE, $queryParameters);
    }
}
