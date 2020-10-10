<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
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
    private $postCommentSuccessfulResponse = CommentData::POST_RESPONSE;

    public function testPostComment(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this
            ->getEncoder()
            ->encode($this->postCommentSuccessfulResponse, $this->getFormatType());

        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $comment = new Comment;
        $comment->fill(CommentData::getDataWithObjects());
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
        $comment = (new Comment)->fill(CommentData::getDataWithObjects());
        $this->api->postComment($comment);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return [
            'getTypes' => [TypeData::getAllResponse(), []],
            'getComments' => [CommentData::getAllResponse(), []],
            'getSelfServiceSettings' => [SettingsData::getResponse(), []],
            'getArticle' => [ArticleData::getResponse(), [1, []]],
            'getArticlesByTerm' => [ArticleData::getAllResponse(), ['test', []]],
            'getArticles' => [ArticleData::getAllResponse(), [[]]],
            'getCategory' => [CategoryData::getResponse(), [1]],
            'getCategories' => [CategoryData::getAllResponse(), [[]]],
            'getTag' => [TagData::getResponse(), [1]],
        ];
    }
}
