<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\Article;

/**
 * Class ArticleFactory
 * @package SupportPal\ApiClient\Factory\SelfService
 */
class ArticleFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Article::class;
    }
}
