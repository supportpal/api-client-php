<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\Extra;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class ExtraData extends BaseModelData
{
    public const DATA = [
        'to_address' => ['test@test.com'],
        'cc_address' => [],
        'bcc_address' => []
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Extra::class;
    }
}
