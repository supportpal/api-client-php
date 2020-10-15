<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\ArticleAttachment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UploadData;

class ArticleAttachmentData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'upload_hash' => '4524f5ea967624acdd84f27707088c8b4734637e',
        'article_id' => 10,
        'locale' => null,
        'original_name' => 'testattachment',
        'created_at' => 1601571606,
        'updated_at' => 1601571606,
        'upload' => UploadData::DATA,
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['upload'] = UploadData::getFilledInstance();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return ArticleAttachment::class;
    }
}
