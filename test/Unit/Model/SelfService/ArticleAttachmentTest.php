<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\ArticleAttachment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleAttachmentData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class ArticleAttachmentTest extends BaseModelTestCase
{
    protected function getModelData(): array
    {
        return (new ArticleAttachmentData)->getDataWithObjects();
    }

    protected function getModel(): Model
    {
        return new ArticleAttachment;
    }
}
