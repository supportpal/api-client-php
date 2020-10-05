<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

class CommentApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE;

    public function testPostComment(): void
    {
        /** @var ObjectProphecy $commentInput */
        $commentInput = $this->prophesize(Comment::class);
        $commentOutput = $this->prophesize(Comment::class);
        $formatType = 'json';

        /** @var Comment $commentMock */
        $commentMock = $commentInput->reveal();
        $this
            ->modelToArrayConverter
            ->convertOne($commentMock)
            ->willReturn(CommentData::COMMENT_DATA)
            ->shouldBeCalled();

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($this->postCommentSuccessfulResponse));

        $this->decoder
            ->decode(json_encode($this->postCommentSuccessfulResponse), $formatType)
            ->shouldBeCalled()
            ->willReturn($this->postCommentSuccessfulResponse);

        $this
            ->apiClient
            ->postSelfServiceComment(CommentData::COMMENT_DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $this
            ->modelCollectionFactory
            ->create(Comment::class, $this->postCommentSuccessfulResponse['data'])
            ->willReturn($commentOutput->reveal());

        $comment = $this->api->postComment($commentMock);
        $this->assertSame($commentOutput->reveal(), $comment);
    }

    public function testPostCommentWithIncompleteData(): void
    {
        /** @var ObjectProphecy $commentInput */
        $commentInput = $this->prophesize(Comment::class);
        /** @var Comment $commentMock */
        $commentMock = $commentInput->reveal();
        $this
            ->modelToArrayConverter
            ->convertOne($commentMock)
            ->willThrow(UninitializedPropertyException::class)
            ->shouldBeCalled();

        /** @var Comment $commentMock */
        $commentMock = $commentInput->reveal();
        $this->expectException(InvalidArgumentException::class);
        $this->api->postComment($commentMock);
    }

    public function testGetComments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE,
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
}
