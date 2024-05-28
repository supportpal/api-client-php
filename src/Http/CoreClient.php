<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\Core\BrandApis;
use SupportPal\ApiClient\Http\Core\SettingsApis;

class CoreClient extends Client
{
    use BrandApis;
    use SettingsApis;
}
