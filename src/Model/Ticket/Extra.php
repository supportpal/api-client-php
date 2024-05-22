<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Extra extends BaseModel
{
    /** @var string[]|null */
    #[SerializedName('bcc_address')]
    protected array|null $bccAddress;

    /** @var string[]|null */
    #[SerializedName('to_address')]
    protected array|null $toAddress;

    /** @var string[]|null */
    #[SerializedName('cc_address')]
    protected array|null $ccAddress;

    /**
     * @return string[]|null
     */
    public function getBccAddress(): ?array
    {
        return $this->bccAddress;
    }

    /**
     * @return string[]|null
     */
    public function getToAddress(): ?array
    {
        return $this->toAddress;
    }

    /**
     * @return string[]|null
     */
    public function getCcAddress(): ?array
    {
        return $this->ccAddress;
    }
}
