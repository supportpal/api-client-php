<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\ArticleType;

/**
 * Class ArticleTypeFactory
 * @package SupportPal\ApiClient\Factory
 */
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
