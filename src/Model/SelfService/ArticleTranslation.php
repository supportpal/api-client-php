<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('text')]
    protected string $text;

    #[SerializedName('title')]
    protected string $title;

    #[SerializedName('plain_text')]
    protected string $plainText;

    #[SerializedName('keywords')]
    protected string|null $keywords;

    #[SerializedName('excerpt')]
    protected string|null $excerpt;

    #[SerializedName('article_id')]
    protected int $articleId;

    #[SerializedName('purified_text')]
    protected string $purifiedText;

    #[SerializedName('slug')]
    protected string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPlainText(): string
    {
        return $this->plainText;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
