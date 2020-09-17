<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\Functional\Api\ApiAwareTestCase;

trait SelfServiceApisTestCase
{
    use ApiAwareTestCase;
    
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
        $jsonSuccessfulBody = $this->getEncoder()->encode($this->postCommentSuccessfulResponse, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this
            ->apiClient
            ->postSelfServiceComment((string) $this->getEncoder()->encode($this->commentData, $this->getFormatType()));
        self::assertSame(
            $this->postCommentSuccessfulResponse,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->apiClient->postSelfServiceComment(
            (string) $this->getEncoder()->encode($this->commentData, $this->getFormatType())
        );
    }

    public function testGetComments(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($this->getCommentsSuccessfulResponse, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this->apiClient->getComments([]);
        self::assertSame(
            $this->getCommentsSuccessfulResponse,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
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
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
