<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
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
     * @var ApiClient
     */
    private $apiClient;

    public function testPostComment(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($this->postCommentSuccessfulResponse);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this->apiClient->postSelfServiceComment((string) json_encode($this->commentData));
        self::assertSame($this->postCommentSuccessfulResponse, json_decode((string) $response->getBody(), true));
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage(json_decode((string) $response->getBody(), true)['status']);
        $this->apiClient->postSelfServiceComment((string) json_encode($this->commentData));
    }

    abstract protected function appendRequestResponse(Response $response): void;

    abstract public function provideUnsuccessfulTestCases(): iterable;
}
