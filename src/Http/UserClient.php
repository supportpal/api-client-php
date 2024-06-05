<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\User\OperatorApis;
use SupportPal\ApiClient\Http\User\OrganisationCustomFieldApis;
use SupportPal\ApiClient\Http\User\SettingsApis;
use SupportPal\ApiClient\Http\User\UserApis;
use SupportPal\ApiClient\Http\User\UserCustomFieldApis;
use SupportPal\ApiClient\Http\User\UserGroupApis;

class UserClient extends Client
{
    use OperatorApis;
    use OrganisationCustomFieldApis;
    use SettingsApis;
    use UserApis;
    use UserCustomFieldApis;
    use UserGroupApis;
}
