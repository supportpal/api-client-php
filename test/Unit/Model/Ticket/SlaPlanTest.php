<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\SlaPlan;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SlaPlanData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class SlaPlanTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new SlaPlanData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new SlaPlan;
    }
}
