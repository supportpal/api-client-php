<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CommentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\CommentApis
 * @covers \SupportPal\ApiClient\Api
 */
class CommentApisTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    /** @var int */
    private $testCommentId = 1;

    public function testPostComment(): void
    {
        $commentData = new CommentData;
        $arrayData = $commentData->getArrayData();
        [$response, $commentMock, $commentOutput] = $this->postCommonExpectations(
            $commentData->getResponse(),
            $arrayData,
            Comment::class
        );

        $this
            ->apiClient
            ->postComment($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $comment = $this->api->postComment($commentMock);
        $this->assertSame($commentOutput->reveal(), $comment);
    }

    public function testPostCommentWithIncompleteData(): void
    {
        /** @var Comment $commentMock */
        $commentMock = $this->postIncompleteDataCommonExpectations(Comment::class);
        $this->expectException(InvalidArgumentException::class);
        $this->api->postComment($commentMock);
    }

    public function testGetComments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CommentData)->getAllResponse(),
            Comment::class
        );

        $this
            ->apiClient
            ->getComments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $comments = $this->api->getComments([]);
        self::assertSame($expectedOutput, $comments);
    }

    public function testGetComment(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CommentData)->getResponse(),
            Comment::class
        );

        $this
            ->apiClient
            ->getComment($this->testCommentId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedComment = $this->api->getComment($this->testCommentId);
        self::assertSame($expectedOutput, $returnedComment);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return SelfServiceApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
