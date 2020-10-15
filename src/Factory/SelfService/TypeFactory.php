<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\Type;

/**
 * Class ArticleTypeFactory
 * @package SupportPal\ApiClient\Factory
 */
class TypeFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Type::class;
    }
}
