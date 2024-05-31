<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\CreateIpBan;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\IpBanData;

class CreateIpBanData extends BaseModelData
{
    public const DATA = [
        'ip'             => '123.1.2.3',
        'reason'         => 'Reason',
        'type'           => 0,
        'event_user'     => 1,
        'event_operator' => 1,
        'event_api'      => 1,
        'expiry_time'    => 1712397600,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateIpBan::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => IpBanData::DATA,
        ];
    }
}
