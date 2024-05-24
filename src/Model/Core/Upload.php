<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Contracts\Service\Attribute\Required;

class Upload extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('hash')]
        public readonly string $hash,
        #[SerializedName('filename')]
        public readonly string $filename,
        #[SerializedName('folder')]
        public readonly string $folder,
        #[SerializedName('mime')]
        public readonly string $mime,
        #[SerializedName('size')]
        public readonly string $size,
        #[SerializedName('token')]
        public readonly ?string $token,
        #[Required]
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('session_id')]
        public readonly ?string $sessionId = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
