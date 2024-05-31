<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\Core\BrandApis;
use SupportPal\ApiClient\Http\Core\IpBanApis;
use SupportPal\ApiClient\Http\Core\IpWhitelistApis;
use SupportPal\ApiClient\Http\Core\LanguageApis;
use SupportPal\ApiClient\Http\Core\SettingsApis;
use SupportPal\ApiClient\Http\Core\SpamRuleApis;

class CoreClient extends Client
{
    use BrandApis;
    use IpBanApis;
    use IpWhitelistApis;
    use LanguageApis;
    use SettingsApis;
    use SpamRuleApis;
}
