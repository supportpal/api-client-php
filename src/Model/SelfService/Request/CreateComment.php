<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

class CreateComment extends Model
{
    public const REQUIRED_FIELDS = [
        'article_id',
        'type_id',
        'text',
    ];

    protected int $articleId;

    protected int $typeId;

    protected ?int $parentId;

    protected ?int $authorId;

    protected ?string $name;

    protected string $text;

    protected ?int $status;

    protected ?bool $notifyReply;
}
