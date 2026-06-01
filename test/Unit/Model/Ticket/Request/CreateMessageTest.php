<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * @extends BaseModelTestCase<CreateMessage>
 */
class CreateMessageTest extends BaseModelTestCase
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
