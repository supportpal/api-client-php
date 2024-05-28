<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\User\CustomFields;
use SupportPal\ApiClient\Api\User\Users;
use SupportPal\ApiClient\Api\User\UserGroups;
use SupportPal\ApiClient\Http\UserClient;

class UserApi extends Api
{
    use CustomFields;
    use Users;
    use UserGroups;

    public function __construct(protected readonly UserClient $apiClient)
    {
    }

    protected function getApiClient(): UserClient
    {
        return $this->apiClient;
    }
}
