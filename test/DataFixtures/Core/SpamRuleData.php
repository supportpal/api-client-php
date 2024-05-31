<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\SpamRule;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SpamRuleData extends BaseModelData
{
    public const DATA = [
        'id'            => 1,
        'text'          => 'Spam Rule',
        'event_message' => 1,
        'event_comment' => 1,
        'type'          => 0,
        'created_at'    => 1712311053,
        'updated_at'    => 1712311053,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return SpamRule::class;
    }
}
