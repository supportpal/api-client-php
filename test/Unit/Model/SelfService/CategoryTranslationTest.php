<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\CategoryTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class CategoryTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\SelfService
 * @covers \SupportPal\ApiClient\Model\SelfService\CategoryTranslation
 */
class CategoryTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CategoryTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CategoryTranslation;
    }
}
