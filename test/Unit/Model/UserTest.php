<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User;
use SupportPal\ApiClient\Tests\DataFixtures\UserData;

class UserTest extends BaseModelTestCase
{
    const USER_DATA = UserData::USER_DATA;

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new User;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::USER_DATA;
    }
}
