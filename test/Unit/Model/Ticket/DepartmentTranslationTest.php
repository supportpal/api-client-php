<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\DepartmentTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class DepartmentTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new DepartmentTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new DepartmentTranslation;
    }
}
