<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Article;
use SupportPal\ApiClient\Model\ArticleType;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\SelfService\SelfServiceCategory;
use SupportPal\ApiClient\Model\SelfService\SelfServiceSettings;
use SupportPal\ApiClient\Model\SelfService\SelfServiceTag as SelfServiceTagAlias;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

/**
 * Contains all ApiCalls pre and post processing that falls under SelfService Module
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\Api
 */
trait SelfServiceApis
{
    use ApiAware;

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function postComment(Comment $comment): Comment
    {
        try {
            $serializedComment = $this->getSerializer()->serialize($comment, $this->getFormatType());
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->getApiClient()->postSelfServiceComment($serializedComment);
        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return $this->createComment($body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Comment[]
     * @throws HttpResponseException
     */
    public function getComments(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getComments($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createComment'], $body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ArticleType[]
     * @throws HttpResponseException
     */
    public function getArticleTypes(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getArticleTypes($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createArticleType'], $body);
    }

    /**
     * @param int $articleId
     * @param array<mixed> $queryParameters
     * @return Article
     * @throws HttpResponseException
     */
    public function getArticle(int $articleId, array $queryParameters = []): Article
    {
        $response = $this->getApiClient()->getArticle($articleId, $queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return $this->createArticle($body);
    }

    /**
     * @param string $term
     * @param array<mixed> $queryParameters
     * @return Article[]
     * @throws HttpResponseException
     */
    public function getArticlesByTerm(string $term, array $queryParameters = []): array
    {
        $queryParameters['term'] = $term;
        $response = $this->getApiClient()->getArticlesByTerm($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createArticle'], $body);
    }

    /**
     * @return SelfServiceSettings
     * @throws HttpResponseException
     */
    public function getSelfServiceSettings(): SelfServiceSettings
    {
        $response = $this->getApiClient()->getSelfServiceSettings();
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];
        /** @var SelfServiceSettings $model */
        $model = $this->getModelCollectionFactory()->create(SelfServiceSettings::class, $body);

        return $model;
    }

    /**
     * @param int $categoryId
     * @return SelfServiceCategory
     * @throws HttpResponseException
     */
    public function getSelfServiceCategory(int $categoryId): SelfServiceCategory
    {
        $response = $this->getApiClient()->getSelfServiceCategory($categoryId);
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return $this->createCategory($body);
    }

    /**
     * @param int $tagId
     * @return SelfServiceTagAlias
     * @throws HttpResponseException
     */
    public function getSelfServiceTag(int $tagId): SelfServiceTagAlias
    {
        $response = $this->getApiClient()->getSelfServiceTag($tagId);
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return $this->createTag($body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return SelfServiceCategory[]
     * @throws HttpResponseException
     */
    public function getSelfServiceCategories(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getSelfServiceCategories($queryParameters);
        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createCategory'], $body);
    }

    /**
     * @param array<mixed> $data
     * @return Comment
     */
    private function createComment(array $data): Comment
    {
        /** @var Comment $model */
        $model = $this->getModelCollectionFactory()->create(Comment::class, $data);

        return $model;
    }

    /**
     * @param array<mixed> $data
     * @return ArticleType
     */
    private function createArticleType(array $data): ArticleType
    {
        /** @var ArticleType $model */
        $model = $this->getModelCollectionFactory()->create(ArticleType::class, $data);

        return $model;
    }

    /**
     * @param array<mixed> $data
     * @return Article
     */
    private function createArticle(array $data): Article
    {
        /** @var Article $model */
        $model = $this->getModelCollectionFactory()->create(Article::class, $data);

        return $model;
    }

    /**
     * @param array<mixed> $data
     * @return SelfServiceCategory
     */
    private function createCategory(array $data): SelfServiceCategory
    {
        /** @var SelfServiceCategory $model */
        $model = $this->getModelCollectionFactory()->create(SelfServiceCategory::class, $data);

        return $model;
    }

    /**
     * @param array<mixed> $data
     * @return SelfServiceTagAlias
     */
    private function createTag(array $data): SelfServiceTagAlias
    {
        /** @var SelfServiceTagAlias $model */
        $model = $this->getModelCollectionFactory()->create(SelfServiceTagAlias::class, $data);

        return $model;
    }
}
