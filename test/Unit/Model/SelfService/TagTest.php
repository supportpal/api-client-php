<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class TagTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\SelfService
 * @covers \SupportPal\ApiClient\Model\SelfService\Tag
 */
class TagTest extends BaseModelTestCase
{
    protected function getModelData(): array
    {
        return TagData::TAG_DATA;
    }

    protected function getModel(): Model
    {
        return new Tag;
    }
}
