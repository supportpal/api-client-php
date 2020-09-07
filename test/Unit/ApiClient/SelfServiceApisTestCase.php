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
     * @var ApiClient
     */
    private $apiClient;


    public function testPostSelfServiceComment(): void
    {
        $request = $this->postSelfServiceCommentRequestExpectations('{test}');
        $response = $this->postSelfServiceCommentExpectations(
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
        $this->postSelfServiceCommentExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postSelfServiceComment('test');
    }

    public function testHttpExceptionPostSelfServiceComment(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->postSelfServiceCommentRequestExpectations('{test}');
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->postSelfServiceComment('{test}');
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
     * @param int $statusCode
     * @param string $responseBody
     * @param ObjectProphecy $request
     * @return ObjectProphecy
     */
    private function postSelfServiceCommentExpectations(
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
