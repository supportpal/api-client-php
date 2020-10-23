<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use Exception;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\SelfServiceApisData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class SelfServiceApisTest extends ApiTestCase
{
    public function testPostComment(): void
    {
        $commentData = new CommentData;
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this
            ->getEncoder()
            ->encode($commentData->getResponse(), $this->getFormatType());

        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $comment = new Comment;
        $comment->fill($commentData->getDataWithObjects());
        $postedComment = $this->api->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, $commentData->getResponse()['data']);
    }

    public function testPostCommentWithIncompleteData(): void
    {
        $comment = new Comment;
        $this->expectException(InvalidArgumentException::class);
        $this->api->postComment($comment);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $commentData = new CommentData;
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var Comment $comment */
        $comment = (new Comment)->fill($commentData->getDataWithObjects());
        $this->api->postComment($comment);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new SelfServiceApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return (new SelfServiceApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return [];
    }
}
