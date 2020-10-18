<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class CommentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\CommentApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CommentApisTest extends ApiClientTest
{
    public function testPostSelfServiceComment(): void
    {
        $commentData = new CommentData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($commentData->getResponse()),
            $request
        );
        $postCommentResponse = $this->apiClient->postSelfServiceComment([]);
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
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postSelfServiceComment([]);
    }

    public function testHttpExceptionPostSelfServiceComment(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->postSelfServiceComment([]);
    }

    public function testGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CommentData)->getAllResponse()),
            $request
        );
        $getCommentsResponse = $this->apiClient->getComments($queryParams);
        self::assertSame($response->reveal(), $getCommentsResponse);
    }

    public function testHttpExceptionGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
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
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getComments($queryParams);
    }
}
