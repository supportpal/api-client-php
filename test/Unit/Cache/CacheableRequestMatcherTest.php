<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Cache;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use SupportPal\ApiClient\Cache\CacheableRequestMatcher;
use SupportPal\ApiClient\Dictionary\ApiDictionary;

class CacheableRequestMatcherTest extends TestCase
{
    use ProphecyTrait;

    /** @var CacheableRequestMatcher */
    private $cacheableRequestMatcher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cacheableRequestMatcher = new CacheableRequestMatcher([
            ApiDictionary::CORE_SETTINGS
        ]);
    }

    #[DataProvider('provideCachableCases')]
    public function testCachableRequest(string $path, string $method): void
    {
        $matches = $this->cacheableRequestMatcher->matches(new Request($method, new Uri($path)));
        self::assertTrue($matches);
    }

    #[DataProvider('provideNonCachableCases')]
    public function testNotCachableRequest(string $path, string $method): void
    {
        $matches = $this->cacheableRequestMatcher->matches(new Request($method, new Uri($path)));
        self::assertFalse($matches);
    }

    /**
     * @return iterable<array<int, string>>
     */
    public static function provideCachableCases(): iterable
    {
        yield [ApiDictionary::CORE_SETTINGS, 'GET'];
    }

    /**
     * @return iterable<array<int, string>>
     */
    public static function provideNonCachableCases(): iterable
    {
        yield [ApiDictionary::SELF_SERVICE_COMMENT, 'GET'];
        yield [ApiDictionary::SELF_SERVICE_COMMENT, 'POST'];
    }
}
