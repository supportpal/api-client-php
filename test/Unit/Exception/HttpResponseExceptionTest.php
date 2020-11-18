<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\TestCase;

class HttpResponseExceptionTest extends TestCase
{
    public function testGettersException(): void
    {
        /** @var RequestInterface $request */
        $request = $this->prophesize(RequestInterface::class)->reveal();
        /** @var ResponseInterface $response */
        $response = $this->prophesize(ResponseInterface::class)->reveal();

        $exception = new HttpResponseException($request, $response);
        self::assertSame($request, $exception->getRequest());
        self::assertSame($response, $exception->getResponse());
    }
}
