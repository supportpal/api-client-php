<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\UpdateWhitelistedIp;

class UpdateWhitelistedIpData extends CreateWhitelistedIpData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateWhitelistedIp::class;
    }
}
