<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\TagTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TagTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class TagTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TagTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new TagTranslation;
    }
}
