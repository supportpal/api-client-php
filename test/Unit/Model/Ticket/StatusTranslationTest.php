<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\StatusTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class StatusTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new StatusTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new StatusTranslation;
    }
}
