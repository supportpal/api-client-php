<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\Category;

/**
 * Class CategoryFactory
 * @package SupportPal\ApiClient\Factory\SelfService
 */
class CategoryFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Category::class;
    }
}
