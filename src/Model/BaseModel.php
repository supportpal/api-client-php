<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Helper\StringHelper;
use Symfony\Component\Serializer\Attribute\SerializedName;

abstract class BaseModel implements Model
{
    use StringHelper;

    public function __construct(
        /** @var array<mixed>|null */
        #[SerializedName('pivot')]
        public readonly ?array $pivot = null,
    ) {
        //
    }
}
