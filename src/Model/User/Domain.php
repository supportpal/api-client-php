<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Domain extends BaseModel
{
    #[SerializedName('organisation_id')]
    private int $organisationId;

    #[SerializedName('domain')]
    private string $domain;

    public function getOrganisationId(): int
    {
        return $this->organisationId;
    }

    public function setOrganisationId(int $organisationId): self
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }
}
