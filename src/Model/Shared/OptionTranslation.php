<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class OptionTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    /** @deprecated This value is not set in all options and will be removed in later versions. */
    #[SerializedName('ticket_custom_field_option_id')]
    private ?int $ticketCustomFieldOptionId;

    #[SerializedName('value')]
    private string $value;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @deprecated
     */
    public function getTicketCustomFieldOptionId(): ?int
    {
        return $this->ticketCustomFieldOptionId;
    }

    /**
     * @deprecated
     */
    public function setTicketCustomFieldOptionId(?int $ticketCustomFieldOptionId): self
    {
        $this->ticketCustomFieldOptionId = $ticketCustomFieldOptionId;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
