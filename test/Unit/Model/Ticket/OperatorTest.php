<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Operator;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\OperatorData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class OperatorTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return OperatorData::OPERATOR_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Operator;
    }
}
