<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\SupportPal;
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

    public function testGetComments(): void
    {
        $this->appendRequestResponse(new Response(200, [], (string) json_encode($this->getCommentsSuccessfulResponse)));
        $comments = $this->getSupportPal()->getApi()->getComments([]);
        foreach ($comments as $offset => $object) {
            $this->assertArrayEqualsObjectFields($object, $this->getCommentsSuccessfulResponse['data'][$offset]);
        }
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetComments(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->getSupportPal()->getApi()->getComments([]);
    }

    /**
     * @param Response $response
     */
    abstract protected function prepareUnsuccessfulApiRequest(Response $response): void;

    /**
     * @param Response $response
     */
    abstract protected function appendRequestResponse(Response $response): void;

    /**
     * @return SupportPal
     */
    abstract protected function getSupportPal(): SupportPal;
}
