<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\GroupTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class GroupTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\User
 * @covers \SupportPal\ApiClient\Model\User\GroupTranslation
 */
class GroupTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new GroupTranslation;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new GroupTranslationData)->getDataWithObjects();
    }
}
