<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

interface SettingsModel extends Model
{
    /**
     * @param mixed $property
     * @param mixed $value
     * @return void
     */
    public function __set(mixed $property, mixed $value);

    /**
     * @return string[]
     */
    public function all(): array;

    /**
     * @param string $name
     * @param mixed|null $default
     * @return string|null
     */
    public function get(string $name, mixed $default = null): ?string;
}
