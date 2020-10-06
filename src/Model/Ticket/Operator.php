<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\User;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Operator extends User
{
    /**
     * @var array<mixed>
     * @SerializedName("pivot")
     */
    private $pivot;

    /**
     * @return array<mixed>
     */
    public function getPivot(): array
    {
        return $this->pivot;
    }

    /**
     * @param array<mixed> $pivot
     * @return Operator
     */
    public function setPivot(array $pivot): self
    {
        $this->pivot = $pivot;

        return $this;
    }
}
