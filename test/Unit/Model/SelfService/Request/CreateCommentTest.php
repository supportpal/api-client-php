<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Request\CreateComment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateCommentData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class CreateCommentTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CreateCommentData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CreateComment;
    }
}
