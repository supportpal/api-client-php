<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

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

protected function castAttribute($key, $value)
{
    if (is_null($value)) {
        return $value;
    }

    $castType = $this->casts[$key] ?? null;

    if ($castType && str_starts_with($castType, 'array:')) {
        $className = substr($castType, 6);

        if (class_exists($className) && is_array($value)) {
            return array_map(function ($item) use ($className) {
                return is_array($item) ? new $className($item) : $item;
            }, $value);
        }
    }

    if ($castType && class_exists($castType) && is_array($value)) {
        return new $castType($value);
    }

    return parent::castAttribute($key, $value);
}
}
