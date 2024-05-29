<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\TypeTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class TypeTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TypeTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new TypeTranslation;
    }
}
