<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ChannelSettings extends BaseModel
{
    /**
     * @var string|null
     * @SerializedName("unauthenticated_users")
     */
    private $unauthenticatedUsers;

    /**
     * @var string|null
     * @SerializedName("show_captcha")
     */
    private $showCaptcha;

    /**
     * @var string|null
     * @SerializedName("append_ip_address")
     */
    private $appendIpAddress;

    /**
     * @var string|null
     * @SerializedName("show_related_articles")
     */
    private $showRelatedArticles;

    /**
     * @return string|null
     */
    public function getUnauthenticatedUsers(): ?string
    {
        return $this->unauthenticatedUsers;
    }

    /**
     * @param string|null $unauthenticatedUsers
     * @return self
     */
    public function setUnauthenticatedUsers(?string $unauthenticatedUsers): self
    {
        $this->unauthenticatedUsers = $unauthenticatedUsers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShowCaptcha(): ?string
    {
        return $this->showCaptcha;
    }

    /**
     * @param string|null $showCaptcha
     * @return self
     */
    public function setShowCaptcha(?string $showCaptcha): self
    {
        $this->showCaptcha = $showCaptcha;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAppendIpAddress(): ?string
    {
        return $this->appendIpAddress;
    }

    /**
     * @param string|null $appendIpAddress
     * @return self
     */
    public function setAppendIpAddress(?string $appendIpAddress): self
    {
        $this->appendIpAddress = $appendIpAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShowRelatedArticles(): ?string
    {
        return $this->showRelatedArticles;
    }

    /**
     * @param string|null $showRelatedArticles
     * @return self
     */
    public function setShowRelatedArticles(?string $showRelatedArticles): self
    {
        $this->showRelatedArticles = $showRelatedArticles;

        return $this;
    }
}
