<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Core;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class BrandTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Core
 * @covers \SupportPal\ApiClient\Model\Core\Brand
 */
class BrandTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new BrandData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Brand;
    }
}
