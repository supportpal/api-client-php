<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateCommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\UpdateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;

class SelfServiceApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
    {
        $articleData = new ArticleData;
        $categoryData = new CategoryData;
        $commentData = new CommentData;
        $settingsData = new SettingsData;
        $tagData = new TagData;
        $typeData = new TypeData;

        return [
            'getArticle' => [$articleData->getResponse(), [1]],
            'getArticlesByTerm' => [$articleData->getAllResponse(), ['search term']],
            'getArticles' => [$articleData->getAllResponse(), [[]]],
            'getRelatedArticles' => [$articleData->getAllResponse(), [1, 'test', []]],
            'getCategories' => [$categoryData->getAllResponse(), []],
            'getCategory' => [$categoryData->getResponse(), [1]],
            'getComments' => [$commentData->getAllResponse(), []],
            'getComment' => [$commentData->getResponse(), [1]],
            'getSettings' => [$settingsData->getResponse(), []],
            'getTag' => [$tagData->getResponse(), [1]],
            'getTags' => [$tagData->getAllResponse(), [[]]],
            'getTypes' => [$typeData->getAllResponse(), []],
            'getType' => [$typeData->getResponse(), [1]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createArticle = new CreateArticleData;
        $createComment = new CreateCommentData;

        return [
            'createArticle' => [$createArticle->getFilledInstance(), $createArticle->getResponse()],
            'createComment' => [$createComment->getFilledInstance(), $createComment->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateArticle = new UpdateArticleData;

        return [
            'updateArticle' => [$updateArticle->getFilledInstance(), $updateArticle->getResponse()],
        ];
    }

    /**
     * @return array<string, int>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteArticle' => 1,
        ];
    }
}
