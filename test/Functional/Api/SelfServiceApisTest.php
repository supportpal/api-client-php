<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 * @coversNothing
 */
class SelfServiceApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getTypes' => [TypeData::GET_TYPES_SUCCESSFUL_RESPONSE, []],
        'getComments' => [CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE, []],
        'getSelfServiceSettings' => [SettingsData::GET_SETTINGS_SUCCESSFUL_RESPONSE, []],
        'getCategories' => [CategoryData::GET_CATEGORIES_SUCCESSFUL_RESPONSE, []],
        'getCategory' => [CategoryData::GET_CATEGORY_SUCCESSFUL_RESPONSE, [1]],
        'getArticle' => [ArticleData::GET_ARTICLE_SUCCESSFUL_RESPONSE, [1]],
        'getArticlesByTerm' => [ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE, ['search term']],
        'getTag' => [TagData::GET_TAG_SUCCESSFUL_RESPONSE, [1]],
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
