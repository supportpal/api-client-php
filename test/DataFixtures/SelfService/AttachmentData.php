<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UploadData;

class AttachmentData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'upload_hash' => '4524f5ea967624acdd84f27707088c8b4734637e',
        'article_id' => 10,
        'locale' => null,
        'original_name' => 'testupload.txt',
        'created_at' => 1601571606,
        'updated_at' => 1601571606,
        'upload' => UploadData::DATA,
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['upload'] = (new UploadData)->getFilledInstance();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Attachment::class;
    }
}
