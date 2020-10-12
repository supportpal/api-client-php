<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Domain extends BaseModel
{
    /**
     * @var int
     * @SerializedName("organisation_id")
     */
    private $organisationId;

    /**
     * @var string
     * @SerializedName("domain")
     */
    private $domain;

    /**
     * @return int
     */
    public function getOrganisationId(): int
    {
        return $this->organisationId;
    }

    /**
     * @param int $organisationId
     * @return self
     */
    public function setOrganisationId(int $organisationId): self
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return self
     */
    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }
}
