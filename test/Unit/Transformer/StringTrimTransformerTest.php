<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Transformer;

use stdClass;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\StringTrimTransformer;

/**
 * Class StringTrimTransformerTest
 * @package SupportPal\ApiClient\Tests\Unit\Transformer
 * @covers \SupportPal\ApiClient\Transformer\StringTrimTransformer
 */
class StringTrimTransformerTest extends TestCase
{
    /** @var StringTrimTransformer */
    private $transformer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->transformer = new StringTrimTransformer;
    }

    public function testCanTransform(): void
    {
        $this->assertTrue($this->transformer->canTransform(''));
    }

    /**
     * @param mixed $data
     * @dataProvider provideCannotTransformCases
     */
    public function testCannotTransform($data): void
    {
        $this->assertFalse($this->transformer->canTransform($data));
    }

    /**
     * @return iterable<int, mixed>
     */
    public function provideCannotTransformCases(): iterable
    {
        yield [[]];
        yield [new stdClass];
        yield [new Comment];
        yield [new Settings];
    }

    /**
     * @param string $input
     * @param string $expected
     * @dataProvider provideTrimStringCases
     */
    public function testTransformTrim(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->transformer->transform($input));
    }

    /**
     * @return iterable<int, array<int, string>>
     */
    public function provideTrimStringCases(): iterable
    {
        yield [' ', ''];
        yield [' test ', 'test'];
        yield [' test', 'test'];
        yield ['test ', 'test'];
        yield ['test', 'test'];
    }
}
