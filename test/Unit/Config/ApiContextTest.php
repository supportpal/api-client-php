<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Config;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Config\ApiContext;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

class ApiContextTest extends TestCase
{
    use PhpUnitCompatibilityTrait;

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
        self::assertSame(self::TOKEN, $this->apiContext->getApiToken());
    }

    /**
     * @param ApiContext $apiContext
     * @param string $expected
     * @dataProvider provideGetApiUrlCases
     */
    public function testGetApiUrl(ApiContext $apiContext, string $expected): void
    {
        self::assertSame($expected, $apiContext->getApiUrl());
    }

    /**
     * @param ApiContext $apiContext
     * @param string $expected
     * @dataProvider provideGetApiPathCases
     */
    public function testGetApiPath(ApiContext $apiContext, string $expected): void
    {
        self::assertSame($expected, $apiContext->getApiPath());
    }

    public function testDisableSsl(): void
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPort(443)->setScheme('https');
        self::assertSame('https://localhost:443/api/', $apiContext->getApiUrl());
        $apiContext->disableSsl();
        self::assertSame('http://localhost:80/api/', $apiContext->getApiUrl());
    }

    public function testEnableSsl(): void
    {
        $apiContext = (new ApiContext(self::HOST, self::TOKEN))->setPort(80)->setScheme('http');
        self::assertSame('http://localhost:80/api/', $apiContext->getApiUrl());
        $apiContext->enableSsl();
        self::assertSame('https://localhost:443/api/', $apiContext->getApiUrl());
    }

    /**
     * @param string $url
     * @param string $expected
     * @throws InvalidArgumentException
     * @dataProvider provideCreateFromUrlCases
     */
    public function testCreateFromUrl(string $url, string $expected): void
    {
        $apiContext = ApiContext::createFromUrl($url, self::TOKEN);
        self::assertSame($expected, $apiContext->getApiUrl());
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

        $apiContext = new ApiContext(self::HOST, self::TOKEN);

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

        $apiContext = new ApiContext(self::HOST, self::TOKEN);

        yield [$apiContext, '/api/'];
    }

    /**
     * @return iterable<array<int, string>>
     */
    public function provideCreateFromUrlCases(): iterable
    {
        yield ['http://localhost/test/test/', 'http://localhost:80/test/test/api/'];
        yield ['http://localhost/test/test/api/', 'http://localhost:80/test/test/api/api/'];
        yield ['https://localhost:443/test/test/api/', 'https://localhost:443/test/test/api/api/'];
        yield ['https://localhost:443/test/test/api//', 'https://localhost:443/test/test/api/api/'];
        yield ['https://localhost', 'https://localhost:443/api/'];
        yield ['https://localhost', 'https://localhost:443/api/'];
        yield ['ftp://localhost', 'ftp://localhost:443/api/'];
        yield ['http://localhost', 'http://localhost:80/api/'];
        yield ['http://localhost:5550', 'http://localhost:5550/api/'];
    }
}
