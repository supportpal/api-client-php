<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Core\BrandApis;
use SupportPal\ApiClient\Api\Core\SettingsApis;

/**
 * Contains all ApiCalls pre and post processing that falls under Core Module
 * Trait CoreApis
 * @package SupportPal\ApiClient\Api
 */
trait CoreApis
{
    use BrandApis;
    use SettingsApis;
}
