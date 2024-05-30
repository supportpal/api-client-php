<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Domain;
use SupportPal\ApiClient\Tests\DataFixtures\User\DomainData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class DomainTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Domain;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new DomainData)->getDataWithObjects();
    }
}
