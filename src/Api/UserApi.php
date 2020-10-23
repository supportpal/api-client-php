<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Api\User\CustomFieldApis;
use SupportPal\ApiClient\Api\User\UserApis;
use SupportPal\ApiClient\Api\User\UserGroupApis;
use SupportPal\ApiClient\ApiClient\UserApiClient;

/**
 * Trait UserApis, includes all related ApiCalls pre and post processing related to Users
 * @package SupportPal\ApiClient\Api\Core
 */
class UserApi extends Api
{
    use CustomFieldApis;
    use UserApis;
    use UserGroupApis;

    /** @var UserApiClient */
    protected $apiClient;

    /**
     * @inheritDoc
     */
    protected function getApiClient(): UserApiClient
    {
        return $this->apiClient;
    }
}
