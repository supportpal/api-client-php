<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use Symfony\Component\Serializer\SerializerInterface;

trait SelfServiceApisTest
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
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var string
     */
    private $serializationType;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var Api
     */
    private $api;

    public function testPostComment(): void
    {
        /** @var ObjectProphecy $commentInput */
        $commentInput = $this->prophesize(Comment::class);
        $commentOutput = $this->prophesize(Comment::class);

        /** @var Comment $commentMock */
        $commentMock = $commentInput->reveal();
        $this
            ->serializer
            ->serialize($commentMock, $this->serializationType)
            ->willReturn('comment')
            ->shouldBeCalled();

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($this->postCommentSuccessfulResponse));

        $this
            ->apiClient
            ->postSelfServiceComment('comment')
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $this
            ->modelCollectionFactory
            ->create(Comment::class, $this->postCommentSuccessfulResponse['data'])
            ->willReturn($commentOutput->reveal());

        $comment = $this->api->postComment($commentMock);
        $this->assertSame($commentOutput->reveal(), $comment);
    }

    public function testGetComments(): void
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($this->getCommentsSuccessfulResponse));

        $returnedComments = [];
        foreach ($this->getCommentsSuccessfulResponse['data'] as $key => $value) {
            $comment = $this->prophesize(Comment::class);
            $this->modelCollectionFactory
                ->create(Comment::class, $value)
                ->shouldBeCalled()
                ->willReturn($comment->reveal());
            array_push($returnedComments, $comment->reveal());
        }

        $this
            ->apiClient
            ->getComments([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $comments = $this->api->getComments([]);
        self::assertSame($returnedComments, $comments);
    }
}
