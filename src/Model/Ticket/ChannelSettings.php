<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ChannelSettings extends BaseModel
{
    #[SerializedName('unauthenticated_users')]
    protected string $unauthenticatedUsers;

    #[SerializedName('show_captcha')]
    protected string $showCaptcha;

    #[SerializedName('append_ip_address')]
    protected string $appendIpAddress;

    #[SerializedName('show_related_articles')]
    protected string $showRelatedArticles;

    public function getUnauthenticatedUsers(): string
    {
        return $this->unauthenticatedUsers;
    }

    public function getShowCaptcha(): string
    {
        return $this->showCaptcha;
    }

    public function getAppendIpAddress(): string
    {
        return $this->appendIpAddress;
    }

    public function getShowRelatedArticles(): string
    {
        return $this->showRelatedArticles;
    }
}
