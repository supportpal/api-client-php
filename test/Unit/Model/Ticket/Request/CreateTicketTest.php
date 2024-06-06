<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<CreateTicket>
 */
class CreateTicketTest extends BaseModelTest
{
    protected string $modelClass = CreateTicket::class;

    public function testAddTag(): void
    {
        $this->model->addTag(1)
            ->addTag(1)
            ->addTag(5);

        self::assertSame(['tag' => [1, 5]], $this->model->toArray());
    }

    public function testAssignOperator(): void
    {
        $this->model->assignOperator(23)
            ->assignOperator(2);

        self::assertSame(['assignedto' => [23, 2]], $this->model->toArray());
    }

    public function testAddWatchingOperator(): void
    {
        $this->model->addWatchingOperator(5)
            ->addWatchingOperator(6)
            ->addWatchingOperator(4);

        self::assertSame(['watching' => [5, 6, 4]], $this->model->toArray());
    }

    public function testSetCustomFieldValue(): void
    {
        $this->model->setCustomFieldValue(1, '2test')
            ->setCustomFieldValue(2, '2test2')
            ->setCustomFieldValue(1, '2test3');

        self::assertSame(['customfield' => [1 => '2test3', 2 => '2test2']], $this->model->toArray());
    }

    public function testAddCc(): void
    {
        $this->model->addCc('test@test.com')
            ->addCc('test2@test.com')
            ->addCc('Test@test.com');

        self::assertSame(['cc' => ['test@test.com', 'test2@test.com']], $this->model->toArray());
    }

    public function testAddAttachment(): void
    {
        $this->model->addAttachment('test', 'test')
            ->addAttachment('test', 'test')
            ->addAttachment('test2', 'test3');

        self::assertSame([
            'attachment' => [
                ['filename' => 'test', 'contents' => 'test'],
                ['filename' => 'test', 'contents' => 'test'],
                ['filename' => 'test2', 'contents' => 'test3']
            ]
        ], $this->model->toArray());
    }
}
