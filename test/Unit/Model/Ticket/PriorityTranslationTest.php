<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\PriorityTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class PriorityTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new PriorityTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new PriorityTranslation;
    }
}
