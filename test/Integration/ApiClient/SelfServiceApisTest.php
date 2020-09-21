<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class SelfServiceApisTest extends ApiClientTest
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
        'getComments' => CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE,
        'getArticleTypes' => ArticleTypeData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
    ];

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

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $endpoint
     * @throws \Exception
     */
    public function testGetEndpoints(array $data, string $endpoint): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($data, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this->apiClient->{$endpoint}([]);
        self::assertSame(
            $data,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
