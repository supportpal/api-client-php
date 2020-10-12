<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Core;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UploadData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class UploadTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Core
 * @covers \SupportPal\ApiClient\Model\Core\Upload
 */
class UploadTest extends BaseModelTestCase
{
    protected function getModelData(): array
    {
        return UploadData::DATA;
    }

    protected function getModel(): Model
    {
        return new Upload;
    }
}
