<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\User\UserCustomFieldFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class UserCustomFieldFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\User
 * @covers \SupportPal\ApiClient\Factory\User\UserCustomFieldFactory
 */
class UserCustomFieldFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new UserCustomFieldFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new UserCustomFieldData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new UserCustomFieldData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return UserCustomField::class;
    }
}
