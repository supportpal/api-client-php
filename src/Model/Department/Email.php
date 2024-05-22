<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Email extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('port')]
    protected ?string $port;

    #[SerializedName('department_id')]
    protected int $departmentId;

    #[SerializedName('type')]
    protected int $type;

    #[SerializedName('server')]
    protected ?string $server;

    #[SerializedName('username')]
    protected ?string $username;

    #[SerializedName('encryption')]
    protected ?int $encryption;

    #[SerializedName('delete_downloaded')]
    protected ?bool $deleteDownloaded;

    #[SerializedName('address')]
    protected string $address;

    #[SerializedName('protocol')]
    protected ?int $protocol;

    #[SerializedName('brand_id')]
    protected int $brandId;

    #[SerializedName('password')]
    protected ?string $password;

    #[SerializedName('consume_all')]
    protected ?bool $consumeAll;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('oauth')]
    protected ?string $oauth;

    #[SerializedName('auth_mech')]
    protected ?string $authMech;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getEncryption(): ?int
    {
        return $this->encryption;
    }

    public function getDeleteDownloaded(): ?bool
    {
        return $this->deleteDownloaded;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getProtocol(): ?int
    {
        return $this->protocol;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getConsumeAll(): ?bool
    {
        return $this->consumeAll;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getOauth(): ?string
    {
        return $this->oauth;
    }

    public function getAuthMech(): ?string
    {
        return $this->authMech;
    }
}
