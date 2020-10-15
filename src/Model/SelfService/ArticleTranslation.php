<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ArticleTranslation extends BaseTranslation
{
    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var string
     * @SerializedName("title")
     */
    private $title;

    /**
     * @var string
     * @SerializedName("plain_text")
     */
    private $plainText;

    /**
     * @var string|null
     * @SerializedName("keywords")
     */
    private $keywords;

    /**
     * @var string|null
     * @SerializedName("excerpt")
     */
    private $excerpt;

    /**
     * @var int
     * @SerializedName("article_id")
     */
    private $articleId;

    /**
     * @var string
     * @SerializedName("purified_text")
     */
    private $purifiedText;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainText(): string
    {
        return $this->plainText;
    }

    /**
     * @param string $plainText
     * @return self
     */
    public function setPlainText(string $plainText): self
    {
        $this->plainText = $plainText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * @param string|null $keywords
     * @return self
     */
    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    /**
     * @param string|null $excerpt
     * @return self
     */
    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

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
     * @return string
     */
    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    /**
     * @param string $purifiedText
     * @return self
     */
    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
