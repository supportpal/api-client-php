<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\TagFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class CommentFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\SelfService\TagFactory
 */
class TagFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new TagFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TagData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new TagData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Tag::class;
    }
}
