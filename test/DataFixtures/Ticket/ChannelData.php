<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\Channel;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class ChannelData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'Web',
        'enabled' => 1,
        'upgrade_available' => 0,
        'version' => null,
        'created_at' => 0,
        'updated_at' => 0,
        'formatted_name' => 'Web',
        'show_on_frontend' => 1,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Channel::class;
    }
}
