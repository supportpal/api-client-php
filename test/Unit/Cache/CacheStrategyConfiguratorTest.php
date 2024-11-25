<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Cache;

use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheStrategyConfigurator;
use SupportPal\ApiClient\Tests\TestCase;

use function sys_get_temp_dir;

class CacheStrategyConfiguratorTest extends TestCase
{
    /** @var ObjectProphecy<ApiCacheMap> */
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
        $apiCacheMap = new ApiCacheMap;
        $this->apiCacheMap
            ->getCacheableApis('/api/')->shouldBeCalled()
            ->willReturn($apiCacheMap->getCacheableApis('/api/'));
        $strategy = $this->cacheConfigurator->buildCacheStrategy(sys_get_temp_dir(), '/api/');
        self::assertInstanceOf(CacheStrategyInterface::class, $strategy);
    }
}
