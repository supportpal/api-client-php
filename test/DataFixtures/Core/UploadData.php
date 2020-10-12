<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class UploadData extends BaseModelData
{
    public const DATA = [
        'id' => 2,
        'hash' => '4524f5ea967624acdd84f27707088c8b4734637e',
        'filename' => 'testattachment',
        'folder' => 'selfservice',
        'mime' => 'inode/x-empty',
        'size' => '1.0 KB',
        'token' => null,
        'created_at' => 1601571603,
        'updated_at' => 1601571603
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Upload::class;
    }
}
