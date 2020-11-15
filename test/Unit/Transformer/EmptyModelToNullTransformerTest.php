<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Transformer;

use stdClass;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\EmptyModelToNullTransformer;

/**
 * Class EmptyModelToNullTransformerTest
 * @package SupportPal\ApiClient\Tests\Unit\Transformer
 * @covers \SupportPal\ApiClient\Transformer\EmptyModelToNullTransformer
 */
class EmptyModelToNullTransformerTest extends TestCase
{
    /** @var EmptyModelToNullTransformer */
    private $transformer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->transformer = new EmptyModelToNullTransformer;
    }

    /**
     * @param Model $model
     * @dataProvider provideModelCases
     */
    public function testTransformNotNull(Model $model): void
    {
        $modelArray = (array) $model;
        $model = $this->transformer->transform($model);
        self::assertEquals($modelArray, (array) $model);
    }

    /**
     * @param Model $model
     * @dataProvider provideEmptyModelCases
     */
    public function testTransformToNull(Model $model): void
    {
        self::assertNull($this->transformer->transform($model));
    }

    /**
     * @param Model $model
     * @dataProvider provideEmptyModelCases
     */
    public function testCanTransform(Model $model): void
    {
        self::assertTrue($this->transformer->canTransform($model));
    }

    /**
     * @param mixed $data
     * @dataProvider provideCannotTransformCases
     */
    public function testCannotTransform($data): void
    {
        self::assertFalse($this->transformer->canTransform($data));
    }

    /**
     * @return iterable<int, mixed>
     * @throws InvalidArgumentException
     */
    public function provideModelCases(): iterable
    {
        yield [(new CommentData)->getFilledInstance()];
        yield [(new TicketData)->getFilledInstance()];
        yield [(new UserData)->getFilledInstance()];
        yield [(new ArticleData)->getFilledInstance()];
    }

    /**
     * @return iterable<int, mixed>
     */
    public function provideEmptyModelCases(): iterable
    {
        yield [new Comment];
        yield [new Ticket];
        yield [new User];
        yield [new Article];
    }

    /**
     * @return iterable<mixed>
     */
    public function provideCannotTransformCases(): iterable
    {
        yield [[]];
        yield [new stdClass];
        yield [''];
        yield [new Settings];
    }
}
