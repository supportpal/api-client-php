<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

/**
 * Class SupportPalTest
 * @package SupportPal\ApiClient\Tests\Functional
 */
class SupportPalTest extends ContainerAwareBaseTestCase
{
    public function testGetRequestFactory(): void
    {
        $this->assertInstanceOf(RequestFactory::class, $this->getSupportPal()->getRequestFactory());
    }

    public function testSendRequestSuccessful(): void
    {
        $response = new Response(
            200,
            [],
            (string) $this->getEncoder()->encode(CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE, $this->getFormatType())
        );
        $this->appendRequestResponse($response);
        $request = $this->getSupportPal()->getRequestFactory()->create('GET', 'test_endpoint');
        $this->assertSame($response, $this->getSupportPal()->sendRequest($request));
    }

    public function testSendRequestUnSuccessful(): void
    {
        $this->expectException(HttpResponseException::class);
        $response = new Response(
            200,
            [],
            (string) $this->getEncoder()->encode($this->genericErrorResponse, $this->getFormatType())
        );
        $this->appendRequestResponse($response);
        $request = $this->getSupportPal()->getRequestFactory()->create('GET', 'test_endpoint');
        $this->getSupportPal()->sendRequest($request);
    }

    public function testGetApi(): void
    {
        self::assertInstanceOf(Api::class, $this->supportPal->getApi());
    }
}
