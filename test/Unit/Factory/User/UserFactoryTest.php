<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\User\UserFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class UserFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\User\UserFactory
 */
class UserFactoryTest extends BaseModelFactoryTestCase
{
    const USER_DATA = UserData::USER_DATA;

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new UserFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::USER_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return User::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new User)->fill(self::USER_DATA);
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return User::class;
    }
}
