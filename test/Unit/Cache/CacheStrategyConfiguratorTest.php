<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Cache;

use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheStrategyConfigurator;
use SupportPal\ApiClient\Tests\TestCase;

use function sys_get_temp_dir;

/**
 * Class CacheStrategyConfiguratorTest
 * @package SupportPal\ApiClient\Tests\Unit\Cache
 * @covers \SupportPal\ApiClient\Cache\CacheStrategyConfigurator
 */
class CacheStrategyConfiguratorTest extends TestCase
{
    /** @var ObjectProphecy */
    private $apiCacheMap;

    /** @var CacheStrategyConfigurator */
    private $cacheConfigurator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->apiCacheMap = $this->prophesize(ApiCacheMap::class);

        /** @var ApiCacheMap $apiCacheMap */
        $apiCacheMap = $this->apiCacheMap->reveal();
        $this->cacheConfigurator = new CacheStrategyConfigurator($apiCacheMap);
    }

    public function testConfigureCache(): void
    {
        $this->apiCacheMap->getCacheableApis('/api/')->shouldBeCalled();
        $strategy = $this->cacheConfigurator->buildCacheStrategy(sys_get_temp_dir(), '/api/');
        self::assertInstanceOf(CacheStrategyInterface::class, $strategy);
    }
}
