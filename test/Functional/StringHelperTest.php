<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

/**
 * Class StringHelperTest
 * @package SupportPal\ApiClient\Tests\Functional
 */
class StringHelperTest extends TestCase
{
    use StringHelper;
    use PhpUnitCompatibilityTrait;

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
