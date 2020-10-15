<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Core;

use SupportPal\ApiClient\Model\Core\BrandTranslation;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class BrandTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Core
 * @covers \SupportPal\ApiClient\Model\Core\BrandTranslation
 */
class BrandTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return BrandTranslationData::getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new BrandTranslation;
    }
}
