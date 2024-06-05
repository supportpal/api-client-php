<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User\Request;

use SupportPal\ApiClient\Model\User\Request\UpdateOperator;

class UpdateOperatorData extends CreateOperatorData
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateOperator::class;
    }
}
