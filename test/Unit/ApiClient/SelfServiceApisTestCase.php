<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient;

use GuzzleHttp\Psr7\Request;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

trait SelfServiceApisTestCase
{
    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    protected $getCommentsSuccessfulResponse = CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE;

    /**
     * @var ApiClient
     */
    private $apiClient;


    public function testPostSelfServiceComment(): void
    {
        $request = $this->postSelfServiceCommentRequestExpectations('{test}');
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->postCommentSuccessfulResponse),
            $request
        );
        $postCommentResponse = $this->apiClient->postSelfServiceComment('{test}');
        self::assertSame($response->reveal(), $postCommentResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostSelfServiceComment(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->postSelfServiceCommentRequestExpectations('test');
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postSelfServiceComment('test');
    }

    public function testHttpExceptionPostSelfServiceComment(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->postSelfServiceCommentRequestExpectations('{test}');
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->postSelfServiceComment('{test}');
    }

    public function testGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->getCommentsRequestExpectations($queryParams);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getCommentsSuccessfulResponse),
            $request
        );
        $getCommentsResponse = $this->apiClient->getComments($queryParams);
        self::assertSame($response->reveal(), $getCommentsResponse);
    }

    public function testHttpExceptionGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->getCommentsRequestExpectations($queryParams);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getComments($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetComments(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->getCommentsRequestExpectations($queryParams);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getComments($queryParams);
    }

    /**
     * @return ObjectProphecy
     */
    private function postSelfServiceCommentRequestExpectations(string $body)
    {
        $request = $this->prophesize(Request::class);
        $this->requestFactory
            ->create('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], $body)
            ->shouldBeCalled()
            ->willReturn($request->reveal());

        return $request;
    }

    /**
     * @param array<mixed> $parameters
     * @return ObjectProphecy
     */
    private function getCommentsRequestExpectations(array $parameters): ObjectProphecy
    {
        $request = $this->prophesize(Request::class);
        $this->requestFactory
            ->create('GET', ApiDictionary::SELF_SERVICE_COMMENT, [], null, $parameters)
            ->shouldBeCalled()
            ->willReturn($request->reveal());

        return $request;
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @param ObjectProphecy $request
     * @return ObjectProphecy
     */
    private function sendRequestCommonExpectations(
        int $statusCode,
        string $responseBody,
        ObjectProphecy $request
    ): ObjectProphecy {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn($statusCode);
        $response->getBody()->willReturn($responseBody);
        $this->httpClient->sendRequest($request->reveal())->shouldBeCalled()->willReturn($response->reveal());

        return $response;
    }
}
