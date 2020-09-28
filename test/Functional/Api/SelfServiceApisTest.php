<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
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
        'getArticles' => [ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE, [[]]],
        'getTag' => [TagData::GET_TAG_SUCCESSFUL_RESPONSE, [1]],
    ];

    public function testPostComment(): void
    {
        $comment = new Comment;
        $comment->fill(CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE['data']);
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode(CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $postedComment = $this->getSupportPal()->getApi()->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE['data']);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $comment = new Comment;
        $comment->fill(CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE['data']);
        $this->prepareUnsuccessfulApiRequest($response);
        $this->getSupportPal()->getApi()->postComment($comment);
    }

    public function testUninitializedComment(): void
    {
        $comment = new Comment;
        $this->expectException(InvalidArgumentException::class);
        $this->getSupportPal()->getApi()->postComment($comment);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
