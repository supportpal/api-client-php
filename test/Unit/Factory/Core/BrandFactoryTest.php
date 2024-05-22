<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Core;

use SupportPal\ApiClient\Factory\Core\BrandFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

class BrandFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new BrandData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new BrandData)->getArrayData();
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
        return new BrandFactory;
    }
}
