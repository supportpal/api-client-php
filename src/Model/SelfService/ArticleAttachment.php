<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleAttachment extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('upload_hash')]
    private string $uploadHash;

    #[SerializedName('article_id')]
    private int $articleId;

    #[SerializedName('locale')]
    private ?string $locale;

    #[SerializedName('original_name')]
    private string $originalName;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('upload')]
    private Upload $upload;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    public function setUploadHash(string $uploadHash): self
    {
        $this->uploadHash = $uploadHash;

        return $this;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

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

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpload(): Upload
    {
        return $this->upload;
    }

    public function setUpload(Upload $upload): self
    {
        $this->upload = $upload;

        return $this;
    }
}
