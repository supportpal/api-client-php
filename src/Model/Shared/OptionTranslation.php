<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OptionTranslation extends BaseTranslation
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @deprecated This value is not set in all options and will be removed in later versions.
     * @var int|null
     * @SerializedName("ticket_custom_field_option_id")
     */
    private $ticketCustomFieldOptionId;

    /**
     * @var string
     * @SerializedName("value")
     */
    private $value;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @deprecated
     * @return int|null
     */
    public function getTicketCustomFieldOptionId(): ?int
    {
        return $this->ticketCustomFieldOptionId;
    }

    /**
     * @deprecated
     * @param int|null $ticketCustomFieldOptionId
     * @return self
     */
    public function setTicketCustomFieldOptionId(?int $ticketCustomFieldOptionId): self
    {
        $this->ticketCustomFieldOptionId = $ticketCustomFieldOptionId;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
