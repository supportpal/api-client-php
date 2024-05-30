<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Channel;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class ChannelTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new ChannelData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Channel;
    }
}
