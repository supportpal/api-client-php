<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SettingsModel;

class Settings implements SettingsModel
{
    /** @var string[] */
    private array $settings;

    /**
     * @inheritDoc
     */
    public function __set(mixed $property, mixed $value): void
    {
        $this->settings[$property] = $value;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name, $default = null): ?string
    {
        return $this->settings[$name] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->settings;
    }

    /**
     * @inheritDoc
     */
    public function fill(array $data): Model
    {
        $this->settings = $data;

        return $this;
    }
}
