<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\TypeFactory;
use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

/**
 * Class ArticleTypeFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
class TypeFactoryTest extends BaseModelFactoryTestCase
{
    const ARTICLE_TYPE_DATA = TypeData::DATA;

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::ARTICLE_TYPE_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Type::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(TypeFactory::class);

        return $modelFactory;
    }
}
