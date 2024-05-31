<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\CreateWhitelistedIp;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\WhitelistedIpData;

class CreateWhitelistedIpData extends BaseModelData
{
    public const DATA = [
        'ip'             => '123.1.2.3',
        'description'    => 'Description',
        'type'           => 0,
        'event_user'     => 1,
        'event_operator' => 1,
        'event_api'      => 1,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateWhitelistedIp::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => WhitelistedIpData::DATA,
        ];
    }
}
