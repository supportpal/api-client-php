<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Extra extends BaseModel
{
    /**
     * @var array<mixed>
     * @SerializedName("bcc_address")
     */
    private $bccAddress;

    /**
     * @var array<mixed>
     * @SerializedName("to_address")
     */
    private $toAddress;

    /**
     * @var array<mixed>
     * @SerializedName("cc_address")
     */
    private $ccAddress;

    /**
     * @return array<mixed>
     */
    public function getBccAddress(): array
    {
        return $this->bccAddress;
    }

    /**
     * @param array<mixed> $bccAddress
     * @return self
     */
    public function setBccAddress(array $bccAddress): self
    {
        $this->bccAddress = $bccAddress;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getToAddress(): array
    {
        return $this->toAddress;
    }

    /**
     * @param array<mixed> $toAddress
     * @return self
     */
    public function setToAddress(array $toAddress): self
    {
        $this->toAddress = $toAddress;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getCcAddress(): array
    {
        return $this->ccAddress;
    }

    /**
     * @param array<mixed> $ccAddress
     * @return self
     */
    public function setCcAddress(array $ccAddress): self
    {
        $this->ccAddress = $ccAddress;

        return $this;
    }
}
