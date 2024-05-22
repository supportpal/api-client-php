<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\User\GroupFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

class UserGroupFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new GroupFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new GroupData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new GroupData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Group::class;
    }
}
