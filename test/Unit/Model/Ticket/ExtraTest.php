<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Extra;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ExtraData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class ExtraTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new ExtraData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Extra;
    }
}
