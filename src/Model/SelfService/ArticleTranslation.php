<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $article_id
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string $plain_text
 * @property string $text
 * @property string $purified_text
 */
class ArticleTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'article_id'    => 'int',
        'title'         => 'string',
        'slug'          => 'string',
        'excerpt'       => 'string',
        'plain_text'    => 'string',
        'text'          => 'string',
        'purified_text' => 'string',
    ];
}
