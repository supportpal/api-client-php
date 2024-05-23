<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Channel extends BaseModel
{
    public function __construct(
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('version')]
        public readonly string|null $version,

        #[SerializedName('enabled')]
        public readonly bool $enabled,

        #[SerializedName('upgrade_available')]
        public readonly bool $upgradeAvailable,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('formatted_name')]
        public readonly string $formattedName,

        #[SerializedName('show_on_frontend')]
        public readonly bool|null $showOnFrontend,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
