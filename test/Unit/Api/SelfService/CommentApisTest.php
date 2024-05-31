<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\SelfService\Request\CreateComment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

class CommentApisTest extends BaseSelfServiceApiTest
{
    /** @var int */
    private $testCommentId = 1;

    public function testGetComments(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new CommentData)->getAllResponse(), Comment::class);

        $this->apiClient
            ->getComments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $comments = $this->api->getComments([]);
        self::assertEquals($output, $comments);
    }

    public function testGetComment(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new CommentData)->getResponse(), Comment::class);

        $this->apiClient
            ->getComment($this->testCommentId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedComment = $this->api->getComment($this->testCommentId);
        self::assertEquals($output, $returnedComment);
    }

    public function testCreateComment(): void
    {
        $commentData = new CommentData;
        $arrayData = $commentData->getArrayData();
        [$commentOutput, $response] = $this->makeCommonExpectations($commentData->getResponse(), Comment::class);

        $this->apiClient
            ->postComment($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $comment = $this->api->createComment(new CreateComment($arrayData));
        self::assertEquals($commentOutput, $comment);
    }
}
