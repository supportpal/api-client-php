<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class TicketCustomFieldTranslation extends BaseTranslation
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("ticket_custom_field_id")
     */
    private $ticketCustomFieldId;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var string|null
     * @SerializedName("regex_error_message")
     */
    private $regexErrorMessage;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TicketCustomFieldTranslation
     */
    public function setName(string $name): TicketCustomFieldTranslation
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getTicketCustomFieldId(): int
    {
        return $this->ticketCustomFieldId;
    }

    /**
     * @param int $ticketCustomFieldId
     * @return self
     */
    public function setTicketCustomFieldId(int $ticketCustomFieldId): self
    {
        $this->ticketCustomFieldId = $ticketCustomFieldId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }

    /**
     * @param string|null $regexErrorMessage
     * @return self
     */
    public function setRegexErrorMessage(?string $regexErrorMessage): self
    {
        $this->regexErrorMessage = $regexErrorMessage;

        return $this;
    }
}
