<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\SelfServiceApisData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class SelfServiceApisTest extends ApiComponentTest
{
    public function testPostComment(): void
    {
        $commentData = new CommentData;
        $comment = new Comment;
        $comment->fill($commentData->getDataWithObjects());
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($commentData->getResponse(), $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $postedComment = $this->getSupportPal()->getApi()->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, $commentData->getResponse()['data']);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $commentData = new CommentData;
        $comment = new Comment;
        $comment->fill($commentData->getDataWithObjects());
        $this->prepareUnsuccessfulApiRequest($response);
        $this->getSupportPal()->getApi()->postComment($comment);
    }

    public function testUninitializedComment(): void
    {
        $comment = new Comment;
        $this->expectException(InvalidArgumentException::class);
        $this->getSupportPal()->getApi()->postComment($comment);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new SelfServiceApisData)->getApiCalls();
    }
}
