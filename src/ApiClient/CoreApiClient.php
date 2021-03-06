<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\ApiClient\Core\BrandApis;
use SupportPal\ApiClient\ApiClient\Core\SettingsApis;

/**
 * Contains all ApiClient calls to Core Apis
 * Trait CoreApis
 * @package SupportPal\ApiClient\ApiClient
 */
class CoreApiClient extends ApiClient
{
    use BrandApis;
    use SettingsApis;
}
