<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Extra extends BaseModel
{
    /**
     * @var string[]|null
     * @SerializedName("bcc_address")
     */
    private $bccAddress;

    /**
     * @var string[]|null
     * @SerializedName("to_address")
     */
    private $toAddress;

    /**
     * @var string[]|null
     * @SerializedName("cc_address")
     */
    private $ccAddress;

    /**
     * @return string[]|null
     */
    public function getBccAddress(): ?array
    {
        return $this->bccAddress;
    }

    /**
     * @param string[]|null $bccAddress
     * @return self
     */
    public function setBccAddress(?array $bccAddress): self
    {
        $this->bccAddress = $bccAddress;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getToAddress(): ?array
    {
        return $this->toAddress;
    }

    /**
     * @param string[]|null $toAddress
     * @return self
     */
    public function setToAddress(?array $toAddress): self
    {
        $this->toAddress = $toAddress;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCcAddress(): ?array
    {
        return $this->ccAddress;
    }

    /**
     * @param string[]|null $ccAddress
     * @return self
     */
    public function setCcAddress(?array $ccAddress): self
    {
        $this->ccAddress = $ccAddress;

        return $this;
    }
}
