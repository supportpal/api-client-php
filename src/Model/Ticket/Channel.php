<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Channel extends BaseModel
{
    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('version')]
    protected string|null $version;

    #[SerializedName('enabled')]
    protected bool $enabled;

    #[SerializedName('upgrade_available')]
    protected bool $upgradeAvailable;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('formatted_name')]
    protected string $formattedName;

    #[SerializedName('show_on_frontend')]
    protected bool|null $showOnFrontend;

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function getUpgradeAvailable(): bool
    {
        return $this->upgradeAvailable;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFormattedName(): string
    {
        return $this->formattedName;
    }

    public function getShowOnFrontend(): ?bool
    {
        return $this->showOnFrontend;
    }
}
