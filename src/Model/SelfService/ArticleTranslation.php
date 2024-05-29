<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

class ArticleTranslation extends Translation
{
    /** @var array<string, string> */
    protected array $casts = [
        'article_id'    => 'int',
        'title'         => 'string',
        'slug'          => 'string',
        'excerpt'       => 'string',
        'plain_text'    => 'string',
        'text'          => 'string',
        'purified_text' => 'string',
    ];
}
