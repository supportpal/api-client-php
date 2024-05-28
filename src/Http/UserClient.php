<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\User\CustomFieldApis;
use SupportPal\ApiClient\Http\User\UserApis;
use SupportPal\ApiClient\Http\User\UserGroupApis;

class UserClient extends Client
{
    use CustomFieldApis;
    use UserApis;
    use UserGroupApis;
}
