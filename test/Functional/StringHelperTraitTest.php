<?php


namespace SupportPal\ApiClient\Tests\Functional;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Helper\StringHelperTrait;

class StringHelperTraitTest extends TestCase
{
    use StringHelperTrait;

    /**
     * @param string $string
     * @param string $expected
     * @dataProvider provideSnakeCaseToCamelCase
     */
    public function testSnakeCaseToCamelCase(string $string, string $expected): void
    {
        self::assertSame($expected, $this->snakeCaseToCamelCase($string));
    }

    /**
     * @param string $string
     * @param string $expected
     * @dataProvider provideSnakeCaseToPascalCase
     */
    public function testSnakeCaseToPascalCase(string $string, string $expected): void
    {
        self::assertSame($expected, $this->snakeCaseToPascalCase($string));
    }

    /**
     * @return string[][]
     */
    public function provideSnakeCaseToCamelCase(): array
    {
        return [
            ['test', 'test'],
            ['test_case', 'testCase'],
            ['test_case_multiple', 'testCaseMultiple'],
            ['', ''],
        ];
    }

    /**
     * @return string[][]
     */
    public function provideSnakeCaseToPascalCase(): array
    {
        return [
            ['test', 'Test'],
            ['test_case', 'TestCase'],
            ['test_case_multiple', 'TestCaseMultiple'],
            ['', ''],
        ];
    }
}
