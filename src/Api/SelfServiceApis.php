<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\SelfService\ArticleApis;
use SupportPal\ApiClient\Api\SelfService\CategoryApis;
use SupportPal\ApiClient\Api\SelfService\CommentApis;
use SupportPal\ApiClient\Api\SelfService\SettingsApis;
use SupportPal\ApiClient\Api\SelfService\TagApis;
use SupportPal\ApiClient\Api\SelfService\TypeApis;

/**
 * Contains all ApiCalls pre and post processing that falls under SelfService Module
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\Api
 */
trait SelfServiceApis
{
    use ArticleApis;
    use CategoryApis;
    use CommentApis;
    use SettingsApis;
    use TagApis;
    use TypeApis;
}
