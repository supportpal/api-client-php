<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class SelfServiceApisTest extends ApiTestCase
{
    /**
     * @var array<mixed>
     */
    private $commentData = CommentData::COMMENT_DATA;

    /**
     * @var array<mixed>
     */
    protected $getCommentsSuccessfulResponse = CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getTypes' => [TypeData::GET_TYPES_SUCCESSFUL_RESPONSE, []],
        'getComments' => [CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE, []],
        'getSelfServiceSettings' => [SettingsData::GET_SETTINGS_SUCCESSFUL_RESPONSE, []],
        'getArticle' => [ArticleData::GET_ARTICLE_SUCCESSFUL_RESPONSE, [1, []]],
        'getArticlesByTerm' => [ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE, ['test', []]],
        'getCategory' => [CategoryData::GET_CATEGORY_SUCCESSFUL_RESPONSE, [1]],
        'getCategories' => [CategoryData::GET_CATEGORIES_SUCCESSFUL_RESPONSE, [[]]],
        'getTag' => [TagData::GET_TAG_SUCCESSFUL_RESPONSE, [1]],
    ];

    public function testPostComment(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this
            ->getEncoder()
            ->encode($this->postCommentSuccessfulResponse, $this->getFormatType());

        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $comment = new Comment;
        $comment->fill($this->postCommentSuccessfulResponse['data']);
        $postedComment = $this->api->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, $this->postCommentSuccessfulResponse['data']);
    }

    public function testPostCommentWithIncompleteData(): void
    {
        $comment = new Comment;
        $this->expectException(InvalidArgumentException::class);
        $this->api->postComment($comment);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var Comment $comment */
        $comment = (new Comment)->fill($this->commentData);
        $this->api->postComment($comment);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
