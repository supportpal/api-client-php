<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Email extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('port')]
        public readonly ?string $port,
        #[SerializedName('department_id')]
        public readonly int $departmentId,
        #[SerializedName('type')]
        public readonly int $type,
        #[SerializedName('server')]
        public readonly ?string $server,
        #[SerializedName('username')]
        public readonly ?string $username,
        #[SerializedName('encryption')]
        public readonly ?int $encryption,
        #[SerializedName('delete_downloaded')]
        public readonly ?bool $deleteDownloaded,
        #[SerializedName('address')]
        public readonly string $address,
        #[SerializedName('protocol')]
        public readonly ?int $protocol,
        #[SerializedName('brand_id')]
        public readonly int $brandId,
        #[SerializedName('password')]
        public readonly ?string $password,
        #[SerializedName('consume_all')]
        public readonly ?bool $consumeAll,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('oauth')]
        public readonly ?string $oauth,
        #[SerializedName('auth_mech')]
        public readonly ?string $authMech,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
