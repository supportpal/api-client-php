<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Domain extends BaseModel
{
    public function __construct(
        #[SerializedName('organisation_id')]
        public readonly int $organisationId,
        #[SerializedName('domain')]
        public readonly string $domain,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
