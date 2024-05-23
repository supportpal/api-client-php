<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use http\Encoding\Stream\Enbrotli;
use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TagTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('tag_id')]
        public readonly int $tagId,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
