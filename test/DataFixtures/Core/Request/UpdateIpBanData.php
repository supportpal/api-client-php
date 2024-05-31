<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\UpdateIpBan;

class UpdateIpBanData extends CreateIpBanData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateIpBan::class;
    }
}
