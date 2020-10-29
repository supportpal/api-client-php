<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Transformer;

use stdClass;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\BooleanToIntTransformer;

class BooleanToIntTransformerTest extends TestCase
{
    /** @var BooleanToIntTransformer */
    private $booleanToIntTransformer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->booleanToIntTransformer = new BooleanToIntTransformer;
    }

    /**
     * @param bool $data
     * @dataProvider provideCanTransformCases
     */
    public function testCanTransform(bool $data): void
    {
        $this->assertTrue($this->booleanToIntTransformer->canTransform($data));
    }

    /**
     * @param mixed $data
     * @dataProvider provideCannotTransformCases
     */
    public function testCannotTransform($data): void
    {
        $this->assertFalse($this->booleanToIntTransformer->canTransform($data));
    }

    /**
     * @param bool $data
     * @param int $expected
     * @dataProvider provideTransformCases
     */
    public function testTransform(bool $data, int $expected): void
    {
        $this->assertSame($expected, $this->booleanToIntTransformer->transform($data));
    }

    /**
     * @return iterable<int, mixed>
     */
    public function provideTransformCases(): iterable
    {
        yield [true, 1];
        yield [false, 0];
    }

    /**
     * @return iterable<array<int, bool>>
     */
    public function provideCanTransformCases(): iterable
    {
        yield [true];
        yield [false];
    }

    /**
     * @return iterable<int, mixed>
     */
    public function provideCannotTransformCases(): iterable
    {
        yield [0.0];
        yield [0];
        yield ['str'];
        yield [new stdClass];
        yield [new Comment];
        yield [[]];
    }
}
