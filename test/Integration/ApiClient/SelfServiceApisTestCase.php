<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
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
        $this->prepareUnsuccessfulApiRequest($response);
        $this->apiClient->postSelfServiceComment((string) json_encode($this->commentData));
    }

    public function testGetComments(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($this->getCommentsSuccessfulResponse);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this->apiClient->getComments([]);
        self::assertSame($this->getCommentsSuccessfulResponse, json_decode((string) $response->getBody(), true));
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetComments(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->apiClient->getComments([]);
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
