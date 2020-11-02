<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Config;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Config\ApiContext;

class ApiContextTest extends TestCase
{
    private const HOST = 'localhost';

    private const TOKEN = 'testtoken';

    /** @var ApiContext */
    private $apiContext;

    protected function setUp(): void
    {
        parent::setUp();
        $this->apiContext = new ApiContext(self::HOST, self::TOKEN);
    }

    public function testToken(): void
    {
        $this->assertSame(self::TOKEN, $this->apiContext->getApiToken());
    }

    /**
     * @param ApiContext $apiContext
     * @param string $expected
     * @dataProvider provideGetApiUrlCases
     */
    public function testGetApiUrl(ApiContext $apiContext, string $expected): void
    {
        $this->assertSame($expected, $apiContext->getApiUrl());
    }

    /**
     * @param ApiContext $apiContext
     * @param string $expected
     * @dataProvider provideGetApiPathCases
     */
    public function testGetApiPath(ApiContext $apiContext, string $expected): void
    {
        $this->assertSame($expected, $apiContext->getApiPath());
    }

    public function testDisableSsl(): void
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPort(443)->setScheme('https');
        $this->assertSame('https://localhost:443/api/', $apiContext->getApiUrl());
        $apiContext->disableSsl();
        $this->assertSame('http://localhost:80/api/', $apiContext->getApiUrl());
    }

    public function testEnableSsl(): void
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPort(80)->setScheme('http');
        $this->assertSame('http://localhost:80/api/', $apiContext->getApiUrl());
        $apiContext->enableSsl();
        $this->assertSame('https://localhost:443/api/', $apiContext->getApiUrl());
    }

    /**
     * @return iterable<array<int, string|ApiContext>>
     */
    public function provideGetApiUrlCases(): iterable
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->enableSsl()->setPath('/test/');

        yield [$apiContext, 'https://localhost:443/test/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->enableSsl()->setPath('//test/test//');

        yield [$apiContext, 'https://localhost:443/test/test/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->disableSsl()->setPath('//test/test//');

        yield [$apiContext, 'http://localhost:80/test/test/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN));

        yield [$apiContext, 'https://localhost:443/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPort(555);

        yield [$apiContext, 'https://localhost:555/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setScheme('ftp');

        yield [$apiContext, 'ftp://localhost:443/api/'];
    }

    /**
     * @return iterable<array<int, string|ApiContext>>
     */
    public function provideGetApiPathCases(): iterable
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPath('/test/');

        yield [$apiContext, '/test/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPath('//test/test//');

        yield [$apiContext, '/test/test/api/'];

        $apiContext = (new ApiContext(self::HOST, self::TOKEN));

        yield [$apiContext, '/api/'];
    }
}
