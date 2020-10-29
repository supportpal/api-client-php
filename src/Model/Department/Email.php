<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Email extends BaseModel
{
    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("port")
     */
    private $port;

    /**
     * @var string
     * @SerializedName("department_id")
     */
    private $departmentId;

    /**
     * @var int
     * @SerializedName("type")
     */
    private $type;

    /**
     * @var string|null
     * @SerializedName("server")
     */
    private $server;

    /**
     * @var string|null
     * @SerializedName("username")
     */
    private $username;

    /**
     * @var int|null
     * @SerializedName("encryption")
     */
    private $encryption;

    /**
     * @var bool|null
     * @SerializedName("delete_downloaded")
     */
    private $deleteDownloaded;

    /**
     * @var string
     * @SerializedName("address")
     */
    private $address;

    /**
     * @var int|null
     * @SerializedName("protocol")
     */
    private $protocol;

    /**
     * @var int
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var string|null
     * @SerializedName("password")
     */
    private $password;

    /**
     * @var bool|null
     * @SerializedName("consume_all")
     */
    private $consumeAll;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string|null
     * @SerializedName("oauth")
     */
    private $oauth;

    /**
     * @var string|null
     * @SerializedName("auth_mech")
     */
    private $authMech;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPort(): ?string
    {
        return $this->port;
    }

    /**
     * @param string|null $port
     * @return self
     */
    public function setPort(?string $port): self
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getDepartmentId(): string
    {
        return $this->departmentId;
    }

    /**
     * @param string $departmentId
     * @return self
     */
    public function setDepartmentId(string $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @param string|null $server
     * @return self
     */
    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEncryption(): ?int
    {
        return $this->encryption;
    }

    /**
     * @param int|null $encryption
     * @return self
     */
    public function setEncryption(?int $encryption): self
    {
        $this->encryption = $encryption;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleteDownloaded(): ?bool
    {
        return $this->deleteDownloaded;
    }

    /**
     * @param bool|null $deleteDownloaded
     * @return self
     */
    public function setDeleteDownloaded(?bool $deleteDownloaded): self
    {
        $this->deleteDownloaded = $deleteDownloaded;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProtocol(): ?int
    {
        return $this->protocol;
    }

    /**
     * @param int|null $protocol
     * @return self
     */
    public function setProtocol(?int $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return self
     */
    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getConsumeAll(): ?bool
    {
        return $this->consumeAll;
    }

    /**
     * @param bool|null $consumeAll
     * @return self
     */
    public function setConsumeAll(?bool $consumeAll): self
    {
        $this->consumeAll = $consumeAll;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOauth(): ?string
    {
        return $this->oauth;
    }

    /**
     * @param string|null $oauth
     * @return self
     */
    public function setOauth(?string $oauth): self
    {
        $this->oauth = $oauth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthMech(): ?string
    {
        return $this->authMech;
    }

    /**
     * @param string|null $authMech
     * @return self
     */
    public function setAuthMech(?string $authMech): self
    {
        $this->authMech = $authMech;

        return $this;
    }
}
