<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Exception\HttpResponseException;
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
        /** @var Comment $comment */
        $comment = $this
            ->getSupportPal()
            ->getCollectionFactory()
            ->create(Comment::class, $this->postCommentSuccessfulResponse['data']);

        $postedComment = $this->api->postComment($comment);
        foreach ($this->postCommentSuccessfulResponse['data'] as $key => $value) {
            self::assertSame($value, $postedComment->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        /** @var Comment $comment */
        $comment = $this
            ->getSupportPal()
            ->getCollectionFactory()
            ->create(Comment::class, $this->commentData);
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage(json_decode((string) $response->getBody(), true)['status']);
        $this->api->postComment($comment);
    }

    abstract protected function appendRequestResponse(Response $response): void;

    abstract public function provideUnsuccessfulTestCases(): iterable;
}
