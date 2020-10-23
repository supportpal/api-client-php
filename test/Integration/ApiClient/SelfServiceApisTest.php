<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use Exception;
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
    public function testPostComment(): void
    {
        $commentData = new CommentData;
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($commentData->getResponse(), $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $response = $this
            ->apiClient
            ->postSelfServiceComment($commentData->getArrayData());

        self::assertSame(
            $commentData->getResponse(),
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
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
        $this->apiClient->postSelfServiceComment($commentData->getArrayData());
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $typeData = new TypeData;
        $commentData = new CommentData;
        $settingsData = new SettingsData;
        $categoryData = new CategoryData;
        $articleData = new ArticleData;
        $tagData = new TagData;

        return [
            'getComments' => [$commentData->getAllResponse(), [[]]],
            'getComment' => [$commentData->getResponse(), [1]],
            'getTypes' => [$typeData->getAllResponse(), [[]]],
            'getType' => [$typeData->getResponse(), [1]],
            'getSelfServiceSettings' => [$settingsData->getResponse(), [[]]],
            'getArticle' => [$articleData->getResponse(), [1, []]],
            'getArticlesByTerm' => [$articleData->getAllResponse(), [[]]],
            'getArticles' => [$articleData->getAllResponse(), [[]]],
            'getCategory' => [$categoryData->getResponse(), [1]],
            'getCategories' => [$categoryData->getAllResponse(), [[]]],
            'getTag' => [$tagData->getResponse(), [1]],
            'getTags' => [$tagData->getAllResponse(), [[]]],
            'getRelatedArticles' => [$tagData->getResponse(), [[]]],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        $commentData = new CommentData;

        return [
            'postSelfServiceComment' => [$commentData->getArrayData(), $commentData->getResponse()],
        ];
    }

    /**
     * @inheritDoc
     */
    public function getPutEndpoints(): array
    {
        return [];
    }
}
