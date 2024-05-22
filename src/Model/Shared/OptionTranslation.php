<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class OptionTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    /** @deprecated This value is not set in all options and will be removed in later versions. */
    #[SerializedName('ticket_custom_field_option_id')]
    protected ?int $ticketCustomFieldOptionId;

    #[SerializedName('value')]
    protected string $value;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @deprecated
     */
    public function getTicketCustomFieldOptionId(): ?int
    {
        return $this->ticketCustomFieldOptionId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
