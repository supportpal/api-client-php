<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class SelfServiceApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
class SelfServiceApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $commentData = CommentData::DATA;

    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_RESPONSE;

    public function testPostComment(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($this->postCommentSuccessfulResponse, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this
            ->apiClient
            ->postSelfServiceComment($this->commentData);

        self::assertSame(
            $this->postCommentSuccessfulResponse,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulPostComment(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->apiClient->postSelfServiceComment($this->commentData);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return [
            'getComments' => [CommentData::getAllResponse(), [[]]],
            'getTypes' => [TypeData::getAllResponse(), [[]]],
            'getSelfServiceSettings' => [SettingsData::getResponse(), [[]]],
            'getArticle' => [ArticleData::getResponse(), [1, []]],
            'getArticlesByTerm' => [ArticleData::getAllResponse(), [[]]],
            'getArticles' => [ArticleData::getAllResponse(), [[]]],
            'getCategory' => [CategoryData::getResponse(), [1]],
            'getCategories' => [CategoryData::getAllResponse(), [[]]],
            'getTag' => [TagData::getResponse(), [1]],
        ];
    }
}
