<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient;

use SupportPal\ApiClient\ApiClient\SelfService\ArticleApis;
use SupportPal\ApiClient\ApiClient\SelfService\CategoryApis;
use SupportPal\ApiClient\ApiClient\SelfService\CommentApis;
use SupportPal\ApiClient\ApiClient\SelfService\SettingsApis;
use SupportPal\ApiClient\ApiClient\SelfService\TagApis;
use SupportPal\ApiClient\ApiClient\SelfService\TypeApis;

/**
 * Contains all ApiClient calls to SelfService Apis
 * Trait SelfServiceApis
 * @package SupportPal\ApiClient\ApiClient
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
