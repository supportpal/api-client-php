<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

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

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getRelatedArticles(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_RELATED, $queryParameters);
    }
}
