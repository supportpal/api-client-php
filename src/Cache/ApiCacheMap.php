<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

/**
 * This class includes the list of cachable apis related to their behaviour
 * Class ApiCacheMap
 * @package SupportPal\ApiClient\Cache
 */
final class ApiCacheMap
{
    private const DEFAULT_CACHE_TTL = 600;

    /**
     * Should not add duplicate entries in sub-arrays.
     * Duplicate entry will use the first occurring cache_ttl
     */
    public const CACHE_MAP = [
        self::DEFAULT_CACHE_TTL => [
            ApiDictionary::CORE_SETTINGS => 'GET',
            ApiDictionary::SELF_SERVICE_SETTINGS => 'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE => 'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE => 'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY => 'GET',
            ApiDictionary::SELF_SERVICE_TAG => 'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH => 'GET',
            ApiDictionary::SELF_SERVICE_COMMENT => 'GET',
        ],
    ];
}
