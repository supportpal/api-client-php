<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ChannelSettings extends BaseModel
{
    /**
     * @var string
     * @SerializedName("unauthenticated_users")
     */
    private $unauthenticatedUsers;

    /**
     * @var string
     * @SerializedName("show_captcha")
     */
    private $showCaptcha;

    /**
     * @var string
     * @SerializedName("append_ip_address")
     */
    private $appendIpAddress;

    /**
     * @var string
     * @SerializedName("show_related_articles")
     */
    private $showRelatedArticles;

    /**
     * @return string
     */
    public function getUnauthenticatedUsers(): string
    {
        return $this->unauthenticatedUsers;
    }

    /**
     * @param string $unauthenticatedUsers
     * @return self
     */
    public function setUnauthenticatedUsers(string $unauthenticatedUsers): self
    {
        $this->unauthenticatedUsers = $unauthenticatedUsers;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowCaptcha(): string
    {
        return $this->showCaptcha;
    }

    /**
     * @param string $showCaptcha
     * @return self
     */
    public function setShowCaptcha(string $showCaptcha): self
    {
        $this->showCaptcha = $showCaptcha;

        return $this;
    }

    /**
     * @return string
     */
    public function getAppendIpAddress(): string
    {
        return $this->appendIpAddress;
    }

    /**
     * @param string $appendIpAddress
     * @return self
     */
    public function setAppendIpAddress(string $appendIpAddress): self
    {
        $this->appendIpAddress = $appendIpAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowRelatedArticles(): string
    {
        return $this->showRelatedArticles;
    }

    /**
     * @param string $showRelatedArticles
     * @return self
     */
    public function setShowRelatedArticles(string $showRelatedArticles): self
    {
        $this->showRelatedArticles = $showRelatedArticles;

        return $this;
    }
}
