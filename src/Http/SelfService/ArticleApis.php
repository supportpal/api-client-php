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
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getArticles(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE, $queryParameters);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getArticle(int $id, array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE . '/' .  $id, $queryParameters);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getArticlesByTerm(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParameters);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getRelatedArticles(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ARTICLE_RELATED, $queryParameters);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postArticle(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::SELF_SERVICE_ARTICLE, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putArticle(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteArticle(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $id);

        return $this->sendRequest($request);
    }
}
