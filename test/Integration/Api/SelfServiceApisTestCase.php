<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

trait SelfServiceApisTestCase
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
     * @var Api
     */
    private $api;

    public function testPostComment(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($this->postCommentSuccessfulResponse);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $comment = new Comment;
        $comment->fill($this->postCommentSuccessfulResponse['data']);
        $postedComment = $this->api->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, $this->postCommentSuccessfulResponse['data']);
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
        $this->appendRequestResponse(new Response(200, [], (string) json_encode($this->getCommentsSuccessfulResponse)));
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

    /**
     * @param Response $response
     */
    abstract protected function prepareUnsuccessfulApiRequest(Response $response): void;

    /**
     * @param Response $response
     */
    abstract protected function appendRequestResponse(Response $response): void;

    /**
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
