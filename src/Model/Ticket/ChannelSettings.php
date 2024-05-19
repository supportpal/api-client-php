<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ChannelSettings extends BaseModel
{
    #[SerializedName('unauthenticated_users')]
    private string $unauthenticatedUsers;

    #[SerializedName('show_captcha')]
    private string $showCaptcha;

    #[SerializedName('append_ip_address')]
    private string $appendIpAddress;

    #[SerializedName('show_related_articles')]
    private string $showRelatedArticles;

    public function getUnauthenticatedUsers(): string
    {
        return $this->unauthenticatedUsers;
    }

    public function setUnauthenticatedUsers(string $unauthenticatedUsers): self
    {
        $this->unauthenticatedUsers = $unauthenticatedUsers;

        return $this;
    }

    public function getShowCaptcha(): string
    {
        return $this->showCaptcha;
    }

    public function setShowCaptcha(string $showCaptcha): self
    {
        $this->showCaptcha = $showCaptcha;

        return $this;
    }

    public function getAppendIpAddress(): string
    {
        return $this->appendIpAddress;
    }

    public function setAppendIpAddress(string $appendIpAddress): self
    {
        $this->appendIpAddress = $appendIpAddress;

        return $this;
    }

    public function getShowRelatedArticles(): string
    {
        return $this->showRelatedArticles;
    }

    public function setShowRelatedArticles(string $showRelatedArticles): self
    {
        $this->showRelatedArticles = $showRelatedArticles;

        return $this;
    }
}
