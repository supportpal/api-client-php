<?php


namespace SupportPal\ApiClient\Tests\Integration;

use SupportPal\ApiClient\Factory\CommentFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Tests\ApiAwareBaseTestClass;

/**
 * @covers \SupportPal\ApiClient\Factory\CommentFactory
 * Class CommentFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration
 */
class CommentFactoryTest extends ApiAwareBaseTestClass
{

    public function testCreateComment(): void
    {
        /** @var CommentFactory $commentFactory */
        $commentFactory = $this->getContainer()->get(CommentFactory::class);

        /** @var Comment $comment */
        $comment = $commentFactory->create(['text' => 'test']);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertEquals('test', $comment->getText());
    }
}
