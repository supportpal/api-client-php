<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ChannelSettings extends BaseModel
{
    public function __construct(
        #[SerializedName('unauthenticated_users')]
        public readonly string $unauthenticatedUsers,

        #[SerializedName('show_captcha')]
        public readonly string $showCaptcha,

        #[SerializedName('append_ip_address')]
        public readonly string $appendIpAddress,

        #[SerializedName('show_related_articles')]
        public readonly string $showRelatedArticles,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
