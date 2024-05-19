<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;
use TypeError;

use function filter_var;
use function is_int;

use const FILTER_VALIDATE_INT;

class Email extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('port')]
    private ?string $port;

    #[SerializedName('department_id')]
    private int|string $departmentId;

    #[SerializedName('type')]
    private int $type;

    #[SerializedName('server')]
    private ?string $server;

    #[SerializedName('username')]
    private ?string $username;

    #[SerializedName('encryption')]
    private ?int $encryption;

    #[SerializedName('delete_downloaded')]
    private ?bool $deleteDownloaded;

    #[SerializedName('address')]
    private string $address;

    #[SerializedName('protocol')]
    private ?int $protocol;

    #[SerializedName('brand_id')]
    private int $brandId;

    #[SerializedName('password')]
    private ?string $password;

    #[SerializedName('consume_all')]
    private ?bool $consumeAll;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('oauth')]
    private ?string $oauth;

    #[SerializedName('auth_mech')]
    private ?string $authMech;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function setPort(?string $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getDepartmentId(): int
    {
        return (int) $this->departmentId;
    }

    public function setDepartmentId(string|int $departmentId): self
    {
        $departmentId = filter_var($departmentId, FILTER_VALIDATE_INT);

        if (! is_int($departmentId)) {
            throw new TypeError('Passed DepartmentId value must be an int');
        }

        $this->departmentId = $departmentId;

        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEncryption(): ?int
    {
        return $this->encryption;
    }

    public function setEncryption(?int $encryption): self
    {
        $this->encryption = $encryption;

        return $this;
    }

    public function getDeleteDownloaded(): ?bool
    {
        return $this->deleteDownloaded;
    }

    public function setDeleteDownloaded(?bool $deleteDownloaded): self
    {
        $this->deleteDownloaded = $deleteDownloaded;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getProtocol(): ?int
    {
        return $this->protocol;
    }

    public function setProtocol(?int $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConsumeAll(): ?bool
    {
        return $this->consumeAll;
    }

    public function setConsumeAll(?bool $consumeAll): self
    {
        $this->consumeAll = $consumeAll;

        return $this;
    }

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

    public function getOauth(): ?string
    {
        return $this->oauth;
    }

    public function setOauth(?string $oauth): self
    {
        $this->oauth = $oauth;

        return $this;
    }

    public function getAuthMech(): ?string
    {
        return $this->authMech;
    }

    public function setAuthMech(?string $authMech): self
    {
        $this->authMech = $authMech;

        return $this;
    }
}
