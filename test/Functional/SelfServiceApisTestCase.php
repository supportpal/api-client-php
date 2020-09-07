<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

trait SelfServiceApisTestCase
{
    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE;


    public function testPostComment(): void
    {
        /** @var Comment $comment */
        $comment = $this
            ->getSupportPal()
            ->getCollectionFactory()
            ->create(Comment::class, $this->postCommentSuccessfulResponse['data']);
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($this->postCommentSuccessfulResponse);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $postedComment = $this->getSupportPal()->getApi()->postComment($comment);
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
            ->create(Comment::class, $this->postCommentSuccessfulResponse['data']);
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage(json_decode((string) $response->getBody(), true)['status']);

        $this->getSupportPal()->getApi()->postComment($comment);
    }

    abstract protected function appendRequestResponse(Response $response): void;

    abstract protected function getSupportPal(): SupportPal;
}
