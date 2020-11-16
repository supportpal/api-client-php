<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

interface SettingsModel extends Model
{
    /**
     * @param mixed $property
     * @param mixed $value
     * @return self
     */
    public function __set($property, $value);

    /**
     * @return string[]
     */
    public function all(): array;

    /**
     * @param string $name
     * @param mixed|null $default
     * @return string|null
     */
    public function get(string $name, $default = null): ?string;
}
