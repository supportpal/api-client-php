<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateComment extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'article_id',
        'type_id',
        'text',
    ];

    #[SerializedName('article_id')]
    private int $articleId;

    #[SerializedName('type_id')]
    private int $typeId;

    #[SerializedName('parent_id')]
    private ?int $parentId;

    #[SerializedName('author_id')]
    private ?int $authorId;

    #[SerializedName('name')]
    private ?string $name;

    #[SerializedName('text')]
    private string $text;

    #[SerializedName('status')]
    private ?int $status;

    #[SerializedName('notify_reply')]
    private ?bool $notifyReply;

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function setAuthorId(?int $authorId): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNotifyReply(): ?bool
    {
        return $this->notifyReply;
    }

    public function setNotifyReply(?bool $notifyReply): self
    {
        $this->notifyReply = $notifyReply;

        return $this;
    }
}
