<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\UpdateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class UpdateMessageData extends BaseModelData
{
    public const DATA = ['text' => 'test'];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateMessage::class;
    }
}
