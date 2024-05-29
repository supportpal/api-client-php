<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User\Request;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateUserData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class CreateUserTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CreateUserData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CreateUser;
    }
}
