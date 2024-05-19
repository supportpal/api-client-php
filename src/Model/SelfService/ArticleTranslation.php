<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('text')]
    private string $text;

    #[SerializedName('title')]
    private string $title;

    #[SerializedName('plain_text')]
    private string $plainText;

    #[SerializedName('keywords')]
    private string|null $keywords;

    #[SerializedName('excerpt')]
    private string|null $excerpt;

    #[SerializedName('article_id')]
    private int $articleId;

    #[SerializedName('purified_text')]
    private string $purifiedText;

    #[SerializedName('slug')]
    private string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPlainText(): string
    {
        return $this->plainText;
    }

    public function setPlainText(string $plainText): self
    {
        $this->plainText = $plainText;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

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

    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
