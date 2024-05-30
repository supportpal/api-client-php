<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\SlaPlanTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SlaPlanTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class SlaPlanTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new SlaPlanTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new SlaPlanTranslation;
    }
}
