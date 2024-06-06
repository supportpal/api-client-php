<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request;

use SupportPal\ApiClient\Model\SelfService\Request\CreateAttachment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\AttachmentData;

class CreateAttachmentData extends BaseModelData
{
    public const DATA = [
        'article_id' => 5,
        'filename'   => 'testupload.txt',
        'contents'   => 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateAttachment::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => AttachmentData::DATA,
        ];
    }
}
