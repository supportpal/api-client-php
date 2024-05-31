<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateCommentData;
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
        $typeData = new TypeData;
        $commentData = new CommentData;
        $settingsData = new SettingsData;
        $categoryData = new CategoryData;
        $articleData = new ArticleData;
        $tagData = new TagData;

        return [
            'getTypes' => [$typeData->getAllResponse(), []],
            'getType' => [$typeData->getResponse(), [1]],
            'getComments' => [$commentData->getAllResponse(), []],
            'getComment' => [$commentData->getResponse(), [1]],
            'getSettings' => [$settingsData->getResponse(), []],
            'getCategories' => [$categoryData->getAllResponse(), []],
            'getCategory' => [$categoryData->getResponse(), [1]],
            'getArticle' => [$articleData->getResponse(), [1]],
            'getArticlesByTerm' => [$articleData->getAllResponse(), ['search term']],
            'getArticles' => [$articleData->getAllResponse(), [[]]],
            'getTag' => [$tagData->getResponse(), [1]],
            'getTags' => [$tagData->getAllResponse(), [[]]],
            'getRelatedArticles' => [$articleData->getAllResponse(), [1, 'test', []]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createComment = new CreateCommentData;

        return [
            'createComment' => [$createComment->getFilledInstance(), $createComment->getResponse()],
        ];
    }
}
