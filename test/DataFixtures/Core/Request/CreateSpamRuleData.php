<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core\Request;

use SupportPal\ApiClient\Model\Core\Request\CreateSpamRule;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SpamRuleData;

class CreateSpamRuleData extends BaseModelData
{
    public const DATA = [
        'text'          => 'Spam Text',
        'type'          => 0,
        'event_message' => 1,
        'event_comment' => 1,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateSpamRule::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => SpamRuleData::DATA,
        ];
    }
}
