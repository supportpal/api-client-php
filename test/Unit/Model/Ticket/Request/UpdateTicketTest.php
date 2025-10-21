<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\UpdateTicket;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<UpdateTicket>
 */
class UpdateTicketTest extends BaseModelTest
{
    protected string $modelClass = UpdateTicket::class;

    public function testSetTag(): void
    {
        $this->model->setTag(1)
            ->setTag(1)
            ->setTag(5);

        self::assertSame(['tag' => [1, 5]], $this->model->toArray());
    }

    public function testSetAssignedOperator(): void
    {
        $this->model->setAssignedOperator(23)
            ->setAssignedOperator(2);

        self::assertSame(['assignedto' => [23, 2]], $this->model->toArray());
    }

    public function testSetWatchingOperator(): void
    {
        $this->model->setWatchingOperator(5)
            ->setWatchingOperator(6)
            ->setWatchingOperator(4);

        self::assertSame(['watching' => [5, 6, 4]], $this->model->toArray());
    }

    public function testLinkTicket(): void
    {
        $this->model->linkTicket(2)
            ->linkTicket(2);

        self::assertSame(['link' => [2]], $this->model->toArray());
    }

    public function testUnlinkTicket(): void
    {
        $this->model->unlinkTicket(2)
            ->unlinkTicket(4)
            ->unlinkTicket(4);

        self::assertSame(['unlink' => [2, 4]], $this->model->toArray());
    }

    public function testSetCustomFieldValue(): void
    {
        $this->model->setCustomFieldValue(1, '2test')
            ->setCustomFieldValue(2, '2test2')
            ->setCustomFieldValue(1, '2test3');

        self::assertSame(['customfield' => [1 => '2test3', 2 => '2test2']], $this->model->toArray());
    }

    public function testSetCc(): void
    {
        $this->model->setCc('test@test.com')
            ->setCc('test2@test.com')
            ->setCc('Test@test.com');

        self::assertSame(['cc' => ['test@test.com', 'test2@test.com']], $this->model->toArray());
    }
}
