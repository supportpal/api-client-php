<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User\Request;

use Propaganistas\LaravelPhone\Exceptions\NumberParseException;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<CreateUser>
 */
class CreateUserModelTest extends BaseModelTest
{
    protected string $modelClass = CreateUser::class;

    public function testSetAdditionalEmail(): void
    {
        $this->model->setAdditionalEmail('test@test.com')
            ->setAdditionalEmail('test2@test.com')
            ->setAdditionalEmail('Test@test.com');

        self::assertSame(['additional_email' => ['test@test.com', 'test2@test.com']], $this->model->toArray());
    }

    public function testSetPhoneNumber(): void
    {
        $this->model->setPhoneNumber('07947465753', 'GB')
            ->setPhoneNumber('+447947465752')
            ->setPhoneNumber('+447947465753')
            ->setPhoneNumber('(234)-555-1234', 'US');

        self::assertSame(['phone' => ['+447947465753', '+447947465752', '+12345551234']], $this->model->toArray());
    }

    public function testSetPhoneNumberInvalidNumber(): void
    {
        $this->expectException(NumberParseException::class);
        $this->expectExceptionMessage('Number does not match the provided country.');
        $this->model->setPhoneNumber('14+%595', 'US');
    }

    public function testSetPhoneNumberCountryRequired(): void
    {
        $this->expectException(NumberParseException::class);
        $this->expectExceptionMessage('Number requires a country to be specified.');
        $this->model->setPhoneNumber('123456789');
    }

    public function testSetPhoneNumberInvalidCountry(): void
    {
        $this->expectException(NumberParseException::class);
        $this->expectExceptionMessage('Number does not match the provided country.');
        $this->model->setPhoneNumber('2323247465753', 'GB');
    }

    public function testSetCustomFieldValue(): void
    {
        $this->model->setCustomFieldValue(1, 'test')
            ->setCustomFieldValue(2, 'test2')
            ->setCustomFieldValue(1, 'test3');

        self::assertSame(['customfield' => [1 => 'test3', 2 => 'test2']], $this->model->toArray());
    }

    public function testSetGroup(): void
    {
        $this->model->setGroup(5)
            ->setGroup(1)
            ->setGroup(1);

        self::assertSame(['group' => [5, 1]], $this->model->toArray());
    }
}
