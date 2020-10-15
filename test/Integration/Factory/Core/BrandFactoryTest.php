<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Core;

use SupportPal\ApiClient\Factory\Core\BrandFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class BrandFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return BrandData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Brand::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(BrandFactory::class);

        return $modelFactory;
    }
}
