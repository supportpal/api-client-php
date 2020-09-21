<?php


namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\ArticleType;

class ArticleTypeFactory extends BaseModelFactory
{

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return ArticleType::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return ArticleType::class;
    }
}
