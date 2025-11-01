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
}
