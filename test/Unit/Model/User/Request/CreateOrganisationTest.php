<?php declare(strict_types=1);

namespace Model\User\Request;

use SupportPal\ApiClient\Model\User\Request\CreateOrganisation;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<CreateOrganisation>
 */
class CreateOrganisationTest extends BaseModelTest
{
    protected string $modelClass = CreateOrganisation::class;

    public function testSetCustomFieldValue(): void
    {
        $this->model->setCustomFieldValue(1, 'test')
            ->setCustomFieldValue(2, 'test2')
            ->setCustomFieldValue(1, 'test3');

        self::assertSame(['customfield' => [1 => 'test3', 2 => 'test2']], $this->model->toArray());
    }

    public function testSetDomain(): void
    {
        $this->model->setDomain('Google.com')
            ->setDomain('microsoft.com')
            ->setDomain('microsoft.com ');

        self::assertSame(['domain' => ['google.com', 'microsoft.com']], $this->model->toArray());
    }

    public function testAddUser(): void
    {
        $this->model->addUser(2, 0)
            ->addUser(3, 0)
            ->addUser(1, 1)
            ->addUser(2, 1);

        self::assertSame(['access_level' => [2 => 1, 3 => 0, 1 => 1]], $this->model->toArray());
    }
}
