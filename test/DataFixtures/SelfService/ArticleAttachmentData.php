<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UploadData;

class ArticleAttachmentData
{
    public const ARTICLE_ATTACHMENT = [
        'id' => 1,
        'upload_hash' => '4524f5ea967624acdd84f27707088c8b4734637e',
        'article_id' => 10,
        'locale' => null,
        'original_name' => 'testattachment',
        'created_at' => 1601571606,
        'updated_at' => 1601571606,
        'upload' => UploadData::UPLOAD_DATA,
    ];

    /**
     * @return array<mixed>
     */
    public static function getAttachmentData(): array
    {
        $data = self::ARTICLE_ATTACHMENT;
        $data['upload'] = new Upload;
        $data['upload']->fill(UploadData::UPLOAD_DATA);

        return $data;
    }
}
