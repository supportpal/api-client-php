<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

use function ltrim;

class ApiCacheMap
{
    protected const DEFAULT_CACHE_TTL = 600;

    /**
     * Should not add duplicate entries in sub-arrays.
     * Duplicate entry will use the first occurring cache_ttl
     */
    protected const CACHE_MAP = [
        self::DEFAULT_CACHE_TTL => [
            ApiDictionary::CORE_BRAND,
            ApiDictionary::CORE_IP_BAN,
            ApiDictionary::CORE_IP_WHITELIST,
            ApiDictionary::CORE_LANGUAGE,
            ApiDictionary::CORE_SETTINGS,
            ApiDictionary::CORE_SPAM_RULE,

            ApiDictionary::SELF_SERVICE_ARTICLE,
            ApiDictionary::SELF_SERVICE_ARTICLE_RELATED,
            ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH,
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE,
            ApiDictionary::SELF_SERVICE_CATEGORY,
            ApiDictionary::SELF_SERVICE_SETTINGS,
            ApiDictionary::SELF_SERVICE_TAG,

            ApiDictionary::TICKET_CHANNEL_SETTINGS,
            ApiDictionary::TICKET_CUSTOMFIELD,
            ApiDictionary::TICKET_DEPARTMENT,
            ApiDictionary::TICKET_PRIORITY,
            ApiDictionary::TICKET_SETTINGS,
            ApiDictionary::TICKET_STATUS,

            ApiDictionary::USER_CUSTOMFIELD,
            ApiDictionary::USER_USERGROUP,
            ApiDictionary::USER_SETTINGS,
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
            foreach ($apis as $api) {
                $apiUri = $baseUrl . ltrim($api, '/');
                $cacheableApis[$ttl][] = $apiUri;
            }
        }

        return $cacheableApis;
    }
}
