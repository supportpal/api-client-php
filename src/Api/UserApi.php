<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\User\Operators;
use SupportPal\ApiClient\Api\User\OrganisationCustomFields;
use SupportPal\ApiClient\Api\User\Settings;
use SupportPal\ApiClient\Api\User\UserCustomFields;
use SupportPal\ApiClient\Api\User\UserGroups;
use SupportPal\ApiClient\Api\User\Users;
use SupportPal\ApiClient\Http\UserClient;

class UserApi extends Api
{
    use Operators;
    use OrganisationCustomFields;
    use Settings;
    use UserCustomFields;
    use UserGroups;
    use Users;

    public function __construct(protected readonly UserClient $apiClient)
    {
    }

    protected function getApiClient(): UserClient
    {
        return $this->apiClient;
    }
}
