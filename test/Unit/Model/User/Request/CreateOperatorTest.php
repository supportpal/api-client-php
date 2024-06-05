<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User\Request;

use SupportPal\ApiClient\Model\User\Request\CreateOperator;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<CreateOperator>
 */
class CreateOperatorTest extends BaseModelTest
{
    protected string $modelClass = CreateOperator::class;

    public function testSetPhoneNumber(): void
    {
        $this->model->setPhoneNumber('07947465753', 'GB')
            ->setPhoneNumber('+447947465752')
            ->setPhoneNumber('+447947465753')
            ->setPhoneNumber('(234)-555-1234', 'US');

        self::assertSame(['phone' => ['+447947465753', '+447947465752', '+12345551234']], $this->model->toArray());
    }

    public function testSetGroup(): void
    {
        $this->model->setGroup(4)
            ->setGroup(3)
            ->setGroup(1);

        self::assertSame(['group' => [4, 3, 1]], $this->model->toArray());
    }

    public function testAssignToDepartment(): void
    {
        $this->model->assignToDepartment(2)
            ->assignToDepartment(3)
            ->assignToDepartment(2);

        self::assertSame(['depts' => [2, 3]], $this->model->toArray());
    }
}
