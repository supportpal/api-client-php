<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ArticleAttachment extends BaseModel
{
    /**
     * @SerializedName("id")
     * @var int
     */
    private $id;

    /**
     * @SerializedName("upload_hash")
     * @var string
     */
    private $uploadHash;

    /**
     *
     * @SerializedName("article_id")
     * @var int
     */
    private $articleId;

    /**
     * @SerializedName("locale")
     * @var string|null
     */
    private $locale;

    /**
     * @SerializedName("original_name")
     * @var string
     */
    private $originalName;

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
     * @SerializedName("upload")
     * @var Upload
     */
    private $upload;

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
    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    /**
     * @param string $uploadHash
     * @return self
     */
    public function setUploadHash(string $uploadHash): self
    {
        $this->uploadHash = $uploadHash;

        return $this;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     * @return self
     */
    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string|null $locale
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return self
     */
    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

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

    /**
     * @return Upload
     */
    public function getUpload(): Upload
    {
        return $this->upload;
    }

    /**
     * @param Upload $upload
     * @return self
     */
    public function setUpload(Upload $upload): self
    {
        $this->upload = $upload;

        return $this;
    }
}
