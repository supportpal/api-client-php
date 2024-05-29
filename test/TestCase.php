<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

use function count;
use function current;
use function is_array;
use function is_bool;
use function is_object;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use PhpUnitCompatibilityTrait;

    /**
     * @param object $obj
     * @param array<mixed> $array
     */
    protected function assertArrayEqualsObjectFields(object $obj, array $array): void
    {
        foreach ($array as $key => $value) {
            $attributeValue = $obj->{$key};
            /**
             * assert against nested objects recursively
             * @example
             * attributeValue = [{type1}, {type2}.., {typeN}]
             * value = [[type1_attrs..], [type2_attrs..], [typeN_attrs...]]
             *
             */
            if (is_array($attributeValue) && ! empty($attributeValue) && is_object(current($attributeValue))) {
                /**
                 * handle array of objects vs nested arrays
                 */
                $this->handleNestedArrays($attributeValue, $value);
                continue;
            }

            /**
             * both are native arrays, just compare equality
             */
            if (is_array($attributeValue) && is_array($value)) {
                self::assertSame($value, $attributeValue);

                continue;
            }

            /**
             * compare atomic values directly
             */
            if (! is_array($value)) {
                $this->handleAtomicValues($attributeValue, $value);

                continue;
            }

            /**
             * for some objects, api returns: [] even if it holds an object not an array
             * We take the Model parameter as the point of truth.
             */
            if ($value === []) {
                self::assertNull($attributeValue);

                continue;
            }

            /**
             * finally compare against nested object recursively
             */
            $this->assertArrayEqualsObjectFields($attributeValue, $value);
        }
    }

    /**
     * @param Collection|Model $models
     * @param array<mixed> $data
     */
    protected function assertApiDataMatchesModels(Model|Collection $models, array $data): void
    {
        if ($models instanceof Collection) {
            self::assertSame($data['count'], $models->getCount());
            foreach ($models->getModels() as $offset => $object) {
                $this->assertArrayEqualsObjectFields($object, $data['data'][$offset]);
            }

            return;
        }

        if (! ($models instanceof Model)) {
            return;
        }

        $this->assertArrayEqualsObjectFields($models, $data['data']);
    }

    /**
     * @param array<mixed> $attributeValue
     * @param mixed $value
     */
    protected function handleNestedArrays(array $attributeValue, mixed $value): void
    {
        for ($i = 0; $i < count($attributeValue); ++$i) {
            if (! is_object($value[$i])) {
                self::assertArrayEqualsObjectFields($attributeValue[$i], $value[$i]);

                continue;
            }

            self::assertSame($attributeValue[$i], $value[$i]);
        }
    }

    /**
     * @param mixed $attributeValue
     * @param mixed $value
     */
    protected function handleAtomicValues(mixed $attributeValue, mixed $value): void
    {
        if (is_bool($attributeValue) || is_bool($value)) {
            /**
             * Int values (for bool type) from Apis are transformed to bool
             */
            self::assertSame((int) $value, (int) $attributeValue);

            return;
        }

        self::assertSame($value, $attributeValue);
    }
}
