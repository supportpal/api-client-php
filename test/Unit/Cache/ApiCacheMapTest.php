<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Cache;

use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Tests\TestCase;

class ApiCacheMapTest extends TestCase
{
    /** @var ApiCacheMap */
    private $apiCacheMap;

    protected function setUp(): void
    {
        parent::setUp();
        $this->apiCacheMap = new ApiCacheMap;
    }

    public function testGetCacheableApis(): void
    {
        $cacheableApis = $this->apiCacheMap->getCacheableApis('/api/');
        foreach ($cacheableApis as $ttl => $apis) {
            $this->assertIsInt($ttl);
            foreach ($apis as $api) {
                $this->assertStringNotContainsString('//', $api);
            }
        }
    }
}
