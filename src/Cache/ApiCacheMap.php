<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

use function ltrim;

/**
 * This class includes the list of cachable apis related to their behaviour
 * Class ApiCacheMap
 * @package SupportPal\ApiClient\Cache
 */
class ApiCacheMap
{
    private const DEFAULT_CACHE_TTL = 600;

    /**
     * Should not add duplicate entries in sub-arrays.
     * Duplicate entry will use the first occurring cache_ttl
     */
    protected const CACHE_MAP = [
        self::DEFAULT_CACHE_TTL => [
            ApiDictionary::CORE_SETTINGS,
            ApiDictionary::SELF_SERVICE_SETTINGS,
            ApiDictionary::SELF_SERVICE_ARTICLE,
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE,
            ApiDictionary::SELF_SERVICE_CATEGORY,
            ApiDictionary::SELF_SERVICE_TAG,
            ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH,
        ],
    ];

    /**
     * @param string $baseUrl
     * @return array<int|string, array<int, string>>
     */
    public function getCacheableApis(string $baseUrl): array
    {
        $cacheableApis = [];
        foreach (static::CACHE_MAP as $ttl => $apis) {
            $cacheableApis[$ttl] = [];
            foreach ($apis as $key => $api) {
                $apiUri = $baseUrl . ltrim($api, '/');
                $cacheableApis[$ttl][] = $apiUri;
            }
        }

        return $cacheableApis;
    }
}
