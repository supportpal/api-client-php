<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\SlaPlan;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SlaPlanData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class SlaPlanTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\SlaPlan
 */
class SlaPlanTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return SlaPlanData::SLA_PLAN_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new SlaPlan;
    }
}
