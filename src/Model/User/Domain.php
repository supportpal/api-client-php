<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Domain extends BaseModel
{
    #[SerializedName('organisation_id')]
    protected int $organisationId;

    #[SerializedName('domain')]
    protected string $domain;

    public function getOrganisationId(): int
    {
        return $this->organisationId;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }
}
