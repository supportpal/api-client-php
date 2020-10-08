<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests;

use SupportPal\ApiClient\Helper\StringHelper;

/**
 * Class TestCase
 * @package SupportPal\ApiClient\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    use StringHelper;

    /**
     * @param object $obj
     * @param array<mixed> $array
     */
    protected function assertArrayEqualsObjectFields(object $obj, array $array): void
    {
        foreach ($array as $key => $value) {
            $attributeValue = $obj->{'get'.$this->snakeCaseToPascalCase($key)}();

            /**
             * assert against nested objects recursively
             * @example
             * attributeValue = [{type1}, {type2}.., {typeN}]
             * value = [[type1_attrs..], [type2_attrs..], [typeN_attrs...]]
             *
             */
            if (is_array($attributeValue) && ! empty($attributeValue) && is_object(current($attributeValue))) {
                for ($i = 0; $i < count($attributeValue); ++$i) {
                    /**
                     * handle array of objects vs nested arrays
                     */
                    if (! is_object($value[$i])) {
                        self::assertArrayEqualsObjectFields($attributeValue[$i], $value[$i]);
                    } else {
                        self::assertSame($attributeValue[$i], $value[$i]);
                    }
                }

                continue;
            } elseif (is_array($attributeValue) && is_array($value)) {
                /**
                 * both are native arrays, just compare equality
                 */
                self::assertSame($value, $attributeValue);
                continue;
            }

            /**
             * compare atomic values directly
             */
            if (! is_array($value)) {
                self::assertSame($value, $attributeValue);
                continue;
            }

            /**
             * finally compare against nested object recursively
             */
            $this->assertArrayEqualsObjectFields($attributeValue, $value);
        }
    }
}
