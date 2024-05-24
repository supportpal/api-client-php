<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\SettingsModel;

class Settings implements SettingsModel
{
    public function __construct(
        /** @var string[] */
        private readonly array $settings
    ) {
        //
    }

    /**
     * @inheritDoc
     */
    public function get(string $name, mixed $default = null): ?string
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
}
