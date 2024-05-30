<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Organisation;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class OrganisationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Organisation;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new OrganisationData)->getDataWithObjects();
    }
}
