<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

interface SettingsModel extends Model
{
    public function __set(mixed $property, mixed $value): void;

    /**
     * @return string[]
     */
    public function all(): array;

    public function get(string $name, mixed $default = null): ?string;
}
