<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateTicket extends BaseModel
{
    public function __construct(
        #[SerializedName('user')]
        public readonly int|null $user,
        #[SerializedName('on_behalf_of')]
        public readonly int|null $onBehalfOf,
        #[SerializedName('user_firstname')]
        public readonly string|null $userFirstname,
        #[SerializedName('user_lastname')]
        public readonly string|null $userLastname,
        #[SerializedName('user_email')]
        public readonly string|null $userEmail,
        #[SerializedName('user_organisation')]
        public readonly string|null $userOrganisation,
        #[SerializedName('user_ip_address')]
        public readonly string|null $userIpAddress,
        #[SerializedName('department')]
        public readonly int $department,
        #[SerializedName('brand')]
        public readonly int|null $brand,
        #[SerializedName('status')]
        public readonly int $status,
        #[SerializedName('priority')]
        public readonly int $priority,
        #[SerializedName('internal')]
        public readonly bool|null $internal,
        #[SerializedName('subject')]
        public readonly string $subject,
        #[SerializedName('text')]
        public readonly string $text,
        /** @var int[]|null */
        #[SerializedName('tag')]
        public readonly array|null $tag,
        /** @var int[]|null */
        #[SerializedName('assignedto')]
        public readonly array|null $assignedto,
        /** @var int[]|null */
        #[SerializedName('watching')]
        public readonly array|null $watching,
        /** @var int[]|null */
        #[SerializedName('customfield')]
        public readonly array|null $customfield,
        /** @var string[]|null */
        #[SerializedName('cc')]
        public readonly array|null $cc,
        #[SerializedName('send_user_email')]
        public readonly int|null $sendUserEmail,
        #[SerializedName('send_operators_email')]
        public readonly int|null $sendOperatorsEmail,
        /** @var string[]|null */
        #[SerializedName('attachment')]
        public readonly array|null $attachment,
        #[SerializedName('created_at')]
        public readonly int|null $createdAt,
        public readonly ?array $pivot = null
    ) {
        parent::__construct($pivot);
    }
}
