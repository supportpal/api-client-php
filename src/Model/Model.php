<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use function array_map;
use function class_exists;
use function is_array;
use function str_starts_with;
use function substr;

/**
 * @method mixed __get(string $key)
 * @method void __set(string $key, mixed $value)
 * @method bool __isset(string $key)
 * @method void __unset(string $key)
 */
abstract class Model extends \Jenssegers\Model\Model
{
    /** @var string[] */
    protected $guarded = [];

    /**
     * Cast an attribute to a native PHP type.
     */
    protected function castAttribute(mixed $key, mixed $value): mixed
    {
        $castType = $this->casts[$key] ?? null;

        if ($value === null || $castType === null) {
            return $value;
        }

        if (is_array($value)) {
            if (str_starts_with($castType, 'array:')) {
                $className = substr($castType, 6);

                if (class_exists($className)) {
                    return $this->castToArrayOfObjects($castType, $value);
                }
            }

            if (class_exists($castType)) {
                return $this->castToObject($castType, $value);
            }
        }

        return parent::castAttribute($key, $value);
    }

    /**
     * @template T of object
     * @param class-string<T> $castType
     * @param array<mixed> $value
     * @return T
     */
    private function castToObject(string $castType, array $value): mixed
    {
        return new $castType($value);
    }

    /**
     * @template T of object
     * @param class-string<T> $className
     * @param array<mixed> $value
     * @return array<int, T|mixed>
     */
    private function castToArrayOfObjects(string $className, array $value): array
    {
        return array_map(function ($item) use ($className) {
            return is_array($item) ? new $className($item) : $item;
        }, $value);
    }
}
