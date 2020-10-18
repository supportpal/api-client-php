<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\ArticleTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleTranslationData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class ArticleTranslationTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\SelfService
 * @covers \SupportPal\ApiClient\Model\SelfService\ArticleTranslation
 */
class ArticleTranslationTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new ArticleTranslationData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new ArticleTranslation;
    }
}
