<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Shared;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Shared\OptionTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Shared\OptionTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class OptionTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Shared
 * @covers \SupportPal\ApiClient\Model\Shared\OptionTranslation
 */
class OptionTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new OptionTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new OptionTranslation;
    }
}
