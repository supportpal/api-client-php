<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\Article;

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
