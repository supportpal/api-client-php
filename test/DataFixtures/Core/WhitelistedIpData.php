<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\WhitelistedIp;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class WhitelistedIpData extends BaseModelData
{
    public const DATA = [
        'id'             => 1,
        'ip'             => '123.1.2.3',
        'description'    => 'Description',
        'event_user'     => 1,
        'event_operator' => 1,
        'event_api'      => 1,
        'created_at'     => 1712311053,
        'updated_at'     => 1712311053,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return WhitelistedIp::class;
    }
}
