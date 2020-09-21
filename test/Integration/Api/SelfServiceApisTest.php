<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\Integration\ApiTest;

class SelfServiceApisTest extends ApiTest
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
        'getArticleTypes' => ArticleTypeData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
        'getComments' => CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE
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
