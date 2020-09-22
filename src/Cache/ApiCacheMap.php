<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Cache;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

class ApiCacheMap
{
    private const DEFAULT_CACHE_TTL = 600;

    /**
     * Should not add duplicate entries in sub-arrays.
     * Duplicate entry will use the first occurring cache_ttl
     */
    public const CACHE_MAP = [
        self::DEFAULT_CACHE_TTL => [
            ApiDictionary::CORE_SETTINGS => 'GET',
        ],
    ];
}