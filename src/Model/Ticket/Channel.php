<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Channel extends BaseModel
{
    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('version')]
    private string|null $version;

    #[SerializedName('enabled')]
    private bool $enabled;

    #[SerializedName('upgrade_available')]
    private bool $upgradeAvailable;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('formatted_name')]
    private string $formattedName;

    #[SerializedName('show_on_frontend')]
    private bool|null $showOnFrontend;

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getUpgradeAvailable(): bool
    {
        return $this->upgradeAvailable;
    }

    public function setUpgradeAvailable(bool $upgradeAvailable): self
    {
        $this->upgradeAvailable = $upgradeAvailable;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFormattedName(): string
    {
        return $this->formattedName;
    }

    public function setFormattedName(string $formattedName): self
    {
        $this->formattedName = $formattedName;

        return $this;
    }

    public function getShowOnFrontend(): ?bool
    {
        return $this->showOnFrontend;
    }

    public function setShowOnFrontend(bool $value): self
    {
        $this->showOnFrontend = $value;

        return $this;
    }
}
