<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional;

use Exception;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Config\ApiContext;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

use function base64_encode;
use function current;

/**
 * Class SupportPalTest
 * @package SupportPal\ApiClient\Tests\Functional
 */
class SupportPalTest extends ContainerAwareBaseTestCase
{
    public function testGetRequestFactory(): void
    {
        self::assertInstanceOf(RequestFactory::class, $this->getSupportPal()->getRequestFactory());
    }

    public function testSendRequestSuccessful(): void
    {
        $response = new Response(
            200,
            [],
            (string) $this->getEncoder()->encode((new CommentData)->getResponse(), $this->getFormatType())
        );
        $this->appendRequestResponse($response);
        $request = $this->getSupportPal()->getRequestFactory()->create('GET', 'test_endpoint');
        self::assertSame($response, $this->getSupportPal()->sendRequest($request));
    }

    public function testSendRequestUnSuccessful(): void
    {
        self::expectException(HttpResponseException::class);
        $response = new Response(
            200,
            [],
            (string) $this->getEncoder()->encode($this->genericErrorResponse, $this->getFormatType())
        );
        $this->appendRequestResponse($response);
        $request = $this->getSupportPal()->getRequestFactory()->create('GET', 'test_endpoint');
        $this->getSupportPal()->sendRequest($request);
    }

    /**
     * @dataProvider provideApiTokens
     * @param string $apiToken
     * @throws Exception
     */
    public function testEscapePercentApiToken(string $apiToken): void
    {
        $request = (new SupportPal(new ApiContext('localhost', $apiToken)))->getRequestFactory()->create('GET', 'test');
        self::assertSame('Basic ' . base64_encode($apiToken . ':X'), current($request->getHeader('Authorization')));
    }

    /**
     * @return iterable<array<int, string>>
     */
    public function provideApiTokens(): iterable
    {
        yield ['api_token_without_percent'];
        yield ['api_token%'];
        yield ['%api_token%'];
        yield ['%api%_tok%en%'];
        yield ['%%%%'];
    }
}
