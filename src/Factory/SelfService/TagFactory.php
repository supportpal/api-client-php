<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\SelfService\Tag;

/**
 * Class TagFactory
 * @package SupportPal\ApiClient\Factory\SelfService
 */
class TagFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Tag::class;
    }
}
