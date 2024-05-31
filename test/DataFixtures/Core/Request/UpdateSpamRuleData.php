<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\UpdateSpamRule;

class UpdateSpamRuleData extends CreateSpamRuleData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateSpamRule::class;
    }
}
