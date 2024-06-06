<?php declare(strict_types=1);

namespace Model\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTest;

/**
 * @extends BaseModelTest<CreateMessage>
 */
class CreateMessageTest extends BaseModelTest
{
    protected string $modelClass = CreateMessage::class;

    public function testAddCc(): void
    {
        $this->model->addCc('test@test.com')
            ->addCc('test2@test.com')
            ->addCc('Test2@test.com');

        self::assertSame(['cc' => ['test@test.com', 'test2@test.com']], $this->model->toArray());
    }

    public function testAddAttachment(): void
    {
        $this->model->addAttachment('test1', 'test1')
            ->addAttachment('test1', 'test1')
            ->addAttachment('test3', 'test2');

        self::assertSame([
            'attachment' => [
                ['filename' => 'test1', 'contents' => 'test1'],
                ['filename' => 'test1', 'contents' => 'test1'],
                ['filename' => 'test3', 'contents' => 'test2']
            ]
        ], $this->model->toArray());
    }
}
