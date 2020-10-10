<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class UserCustomField
 * @package SupportPal\ApiClient\Tests\Unit\Model\User
 * @covers \SupportPal\ApiClient\Model\User\UserCustomField
 * @covers \SupportPal\ApiClient\Model\Shared\CustomField
 */
class UserCustomFieldTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new UserCustomField;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return UserCustomFieldData::getDataWithObjects();
    }
}
