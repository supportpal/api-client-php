<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateMessageData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class CreateMessageTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request
 * @covers \SupportPal\ApiClient\Model\Ticket\Request\CreateMessage
 */
class CreateMessageTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CreateMessageData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CreateMessage;
    }
}
