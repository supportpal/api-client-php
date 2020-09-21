<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\ApiTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

class SelfServiceApisTest extends ApiTestCase
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getArticleTypes' => ArticleTypeData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
        'getComments' => CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE
    ];

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @throws \Exception
     */
    public function testGetEndpoint(array $data, string $functionName): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($data, $this->getFormatType())
            )
        );

        $models = $this->getSupportPal()->getApi()->{$functionName}();
        foreach ($models as $offset => $object) {
            $this->assertArrayEqualsObjectFields($object, $data['data'][$offset]);
        }
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->getSupportPal()->getApi()->{$endpoint}();
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
