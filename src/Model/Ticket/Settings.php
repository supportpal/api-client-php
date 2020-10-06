<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Settings extends BaseModel
{
    /**
     * @var string
     * @SerializedName("default_open_status")
     */
    private $defaultOpenStatus;

    /**
     * @var string
     * @SerializedName("ticket_number_format")
     */
    private $ticketNumberFormat;

    /**
     * @var string
     * @SerializedName("default_reply_status")
     */
    private $defaultReplyStatus;

    /**
     * @var string
     * @SerializedName("default_resolved_status")
     */
    private $defaultResolvedStatus;

    /**
     * @var string
     * @SerializedName("allowed_files")
     */
    private $allowedFiles;

    /**
     * @var string
     * @SerializedName("ticket_notes_position")
     */
    private $ticketNotesPosition;

    /**
     * @var string
     * @SerializedName("waiting_response_time")
     */
    private $waitingResponseTime;

    /**
     * @var string
     * @SerializedName("inactive_close_time")
     */
    private $inactiveCloseTime;

    /**
     * @var string
     * @SerializedName("ticket_reply_order")
     */
    private $ticketReplyOrder;

    /**
     * @return string
     */
    public function getDefaultOpenStatus(): string
    {
        return $this->defaultOpenStatus;
    }

    /**
     * @param string $defaultOpenStatus
     * @return self
     */
    public function setDefaultOpenStatus(string $defaultOpenStatus): self
    {
        $this->defaultOpenStatus = $defaultOpenStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getTicketNumberFormat(): string
    {
        return $this->ticketNumberFormat;
    }

    /**
     * @param string $ticketNumberFormat
     * @return self
     */
    public function setTicketNumberFormat(string $ticketNumberFormat): self
    {
        $this->ticketNumberFormat = $ticketNumberFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultReplyStatus(): string
    {
        return $this->defaultReplyStatus;
    }

    /**
     * @param string $defaultReplyStatus
     * @return self
     */
    public function setDefaultReplyStatus(string $defaultReplyStatus): self
    {
        $this->defaultReplyStatus = $defaultReplyStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultResolvedStatus(): string
    {
        return $this->defaultResolvedStatus;
    }

    /**
     * @param string $defaultResolvedStatus
     * @return self
     */
    public function setDefaultResolvedStatus(string $defaultResolvedStatus): self
    {
        $this->defaultResolvedStatus = $defaultResolvedStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowedFiles(): string
    {
        return $this->allowedFiles;
    }

    /**
     * @param string $allowedFiles
     * @return self
     */
    public function setAllowedFiles(string $allowedFiles): self
    {
        $this->allowedFiles = $allowedFiles;

        return $this;
    }

    /**
     * @return string
     */
    public function getTicketNotesPosition(): string
    {
        return $this->ticketNotesPosition;
    }

    /**
     * @param string $ticketNotesPosition
     * @return self
     */
    public function setTicketNotesPosition(string $ticketNotesPosition): self
    {
        $this->ticketNotesPosition = $ticketNotesPosition;

        return $this;
    }

    /**
     * @return string
     */
    public function getWaitingResponseTime(): string
    {
        return $this->waitingResponseTime;
    }

    /**
     * @param string $waitingResponseTime
     * @return self
     */
    public function setWaitingResponseTime(string $waitingResponseTime): self
    {
        $this->waitingResponseTime = $waitingResponseTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getInactiveCloseTime(): string
    {
        return $this->inactiveCloseTime;
    }

    /**
     * @param string $inactiveCloseTime
     * @return self
     */
    public function setInactiveCloseTime(string $inactiveCloseTime): self
    {
        $this->inactiveCloseTime = $inactiveCloseTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getTicketReplyOrder(): string
    {
        return $this->ticketReplyOrder;
    }

    /**
     * @param string $ticketReplyOrder
     * @return self
     */
    public function setTicketReplyOrder(string $ticketReplyOrder): self
    {
        $this->ticketReplyOrder = $ticketReplyOrder;

        return $this;
    }
}
