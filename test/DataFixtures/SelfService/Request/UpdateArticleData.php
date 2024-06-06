<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request;

use SupportPal\ApiClient\Model\SelfService\Request\UpdateArticle;

class UpdateArticleData extends CreateArticleData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateArticle::class;
    }
}
