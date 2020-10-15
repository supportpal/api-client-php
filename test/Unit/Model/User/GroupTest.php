<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class GroupTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\User
 * @covers \SupportPal\ApiClient\Model\User\Group
 */
class GroupTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Group;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return GroupData::getDataWithObjects();
    }
}
