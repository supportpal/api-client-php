<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

interface SettingsModel extends Model
{
    /**
     * @return string[]
     */
    public function all(): array;

    public function get(string $name, mixed $default = null): ?string;
}
