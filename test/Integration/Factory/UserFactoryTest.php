<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\UserFactory;
use SupportPal\ApiClient\Model\User;
use SupportPal\ApiClient\Tests\DataFixtures\UserData;

class UserFactoryTest extends BaseModelFactoryTestCase
{
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
    protected function getModelData(): array
    {
        return UserData::USER_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return User::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(UserFactory::class);

        return $modelFactory;
    }
}
