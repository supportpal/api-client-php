<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\TagTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class TagTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return TagTranslationData::getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new TagTranslation;
    }
}
