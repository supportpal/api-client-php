<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Upload extends BaseModel
{
    /**
     * @SerializedName("id")
     * @var int
     */
    private $id;

    /**
     * @SerializedName("hash")
     * @var string
     */
    private $hash;

    /**
     * @SerializedName("filename")
     * @var string
     */
    private $filename;

    /**
     * @SerializedName("folder")
     * @var string
     */
    private $folder;

    /**
     * @SerializedName("mime")
     * @var string
     */
    private $mime;

    /**
     * @SerializedName("size")
     * @var string
     */
    private $size;

    /**
     * @SerializedName("token")
     * @var string|null
     */
    private $token;

    /**
     * @SerializedName("created_at")
     * @var int
     */
    private $createdAt;

    /**
     * @SerializedName("updated_at")
     * @var int
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return self
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return self
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return string
     */
    public function getFolder(): string
    {
        return $this->folder;
    }

    /**
     * @param string $folder
     * @return self
     */
    public function setFolder(string $folder): self
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * @return string
     */
    public function getMime(): string
    {
        return $this->mime;
    }

    /**
     * @param string $mime
     * @return self
     */
    public function setMime(string $mime): self
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     * @return self
     */
    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return self
     */
    public function setToken(?string $token): self
    {
        $this->token = $token;

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
}
