<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Core;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\User\UserFactory;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

/**
 * Class UserFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
class UserFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return UserData::DATA;
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
