<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Contracts\Service\Attribute\Required;

class Upload extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('hash')]
    protected string $hash;

    #[SerializedName('filename')]
    protected string $filename;

    #[SerializedName('folder')]
    protected string $folder;

    #[SerializedName('mime')]
    protected string $mime;

    #[SerializedName('size')]
    protected string $size;

    #[SerializedName('token')]
    protected ?string $token;

    #[Required]
    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('session_id')]
    protected ?string $sessionId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getFolder(): string
    {
        return $this->folder;
    }

    public function getMime(): string
    {
        return $this->mime;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }
}
