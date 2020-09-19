<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Comment;
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

    public function testGetComments(): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($this->getCommentsSuccessfulResponse, $this->getFormatType())
            )
        );
        $comments = $this->api->getComments([]);
        foreach ($comments as $offset => $object) {
            $this->assertArrayEqualsObjectFields($object, $this->getCommentsSuccessfulResponse['data'][$offset]);
        }
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetComments(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->api->getComments([]);
    }
}
