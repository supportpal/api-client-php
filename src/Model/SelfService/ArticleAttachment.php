<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleAttachment extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('upload_hash')]
    protected string $uploadHash;

    #[SerializedName('article_id')]
    protected int $articleId;

    #[SerializedName('locale')]
    protected ?string $locale;

    #[SerializedName('original_name')]
    protected string $originalName;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('upload')]
    protected Upload $upload;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getUpload(): Upload
    {
        return $this->upload;
    }
}
