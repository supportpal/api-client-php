<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User\Request;

use SupportPal\ApiClient\Model\User\Request\UpdateOrganisation;

class UpdateOrganisationData extends CreateOrganisationData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateOrganisation::class;
    }
}
