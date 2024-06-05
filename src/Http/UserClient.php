<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\User\CustomFieldApis;
use SupportPal\ApiClient\Http\User\OperatorApis;
use SupportPal\ApiClient\Http\User\SettingsApis;
use SupportPal\ApiClient\Http\User\UserApis;
use SupportPal\ApiClient\Http\User\UserGroupApis;

class UserClient extends Client
{
    use CustomFieldApis;
    use OperatorApis;
    use SettingsApis;
    use UserApis;
    use UserGroupApis;
}
