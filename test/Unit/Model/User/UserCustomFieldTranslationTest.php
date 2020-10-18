<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\UserCustomFieldTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class UserCustomFieldTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\User
 * @covers \SupportPal\ApiClient\Model\User\UserCustomFieldTranslation
 */
class UserCustomFieldTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new UserCustomFieldTranslation;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new UserCustomFieldTranslationData)->getDataWithObjects();
    }
}
