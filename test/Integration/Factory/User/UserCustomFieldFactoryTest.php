<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\User\UserCustomFieldFactory;
use SupportPal\ApiClient\Model\User\UserCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class UserCustomFieldFactoryTest extends BaseModelFactoryTestCase
{
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
    protected function getModel(): string
    {
        return UserCustomField::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(UserCustomFieldFactory::class);

        return $modelFactory;
    }
}
