<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class SelfServiceApisTest extends ApiComponentTest
{
    public function testPostComment(): void
    {
        $comment = new Comment;
        $comment->fill(CommentData::getDataWithObjects());
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode(CommentData::POST_RESPONSE);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $postedComment = $this->getSupportPal()->getApi()->postComment($comment);
        $this->assertArrayEqualsObjectFields($postedComment, CommentData::POST_RESPONSE['data']);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $comment = new Comment;
        $comment->fill(CommentData::getDataWithObjects());
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
        return [
            'getTypes' => [TypeData::getAllResponse(), []],
            'getComments' => [CommentData::getAllResponse(), []],
            'getSelfServiceSettings' => [SettingsData::getResponse(), []],
            'getCategories' => [CategoryData::getAllResponse(), []],
            'getCategory' => [CategoryData::getResponse(), [1]],
            'getArticle' => [ArticleData::getResponse(), [1]],
            'getArticlesByTerm' => [ArticleData::getAllResponse(), ['search term']],
            'getArticles' => [ArticleData::getAllResponse(), [[]]],
            'getTag' => [TagData::getResponse(), [1]],
        ];
    }
}
