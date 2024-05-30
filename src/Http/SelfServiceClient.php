<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http;

use SupportPal\ApiClient\Http\SelfService\ArticleApis;
use SupportPal\ApiClient\Http\SelfService\CategoryApis;
use SupportPal\ApiClient\Http\SelfService\CommentApis;
use SupportPal\ApiClient\Http\SelfService\SettingsApis;
use SupportPal\ApiClient\Http\SelfService\TagApis;
use SupportPal\ApiClient\Http\SelfService\TypeApis;

class SelfServiceClient extends Client
{
    use ArticleApis;
    use CategoryApis;
    use CommentApis;
    use SettingsApis;
    use TagApis;
    use TypeApis;
}
