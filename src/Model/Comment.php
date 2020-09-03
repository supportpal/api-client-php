<?php


namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @TODO Verify types with Documentation
 * @TODO Add Validator (i.e parent_id > 0, status pending..etc)
 */

/**
 * This data class defines the Comment model data attributes
 * Class Comment
 * @package SupportPal\ApiClient\Model
 */
class Comment implements Model
{
    public const REQUIRED_FIELDS = ['text'];

    /**
     * @var string
     * @SerializedName('text')
     */
    private $text;

    /**
     * @var int
     * @SerializedName('article_id)
     */
    private $articleId;

    /**
     * @var int
     * @SerializedName('type_id)
     */
    private $typeId;

    /**
     * @var int
     * @SerializedName('parent_id')
     */
    private $parentId;

    /**
     * @var string
     * @SerializedName('status')
     */
    private $status;

    /**
     * @var bool
     * @SerializedName('notify_reply')
     */
    private $notifyReply;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
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
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return self
     */
    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     * @return self
     */
    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNotifyReply(): bool
    {
        return $this->notifyReply;
    }

    /**
     * @param bool $notifyReply
     * @return self
     */
    public function setNotifyReply(bool $notifyReply): self
    {
        $this->notifyReply = $notifyReply;
        return $this;
    }
}
