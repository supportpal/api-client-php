<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\PriorityTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class PriorityTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\PriorityTranslation
 */
class PriorityTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return PriorityTranslationData::getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new PriorityTranslation;
    }
}
