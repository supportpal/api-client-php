<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\ApiTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

class SelfServiceApisTest extends ApiTestCase
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getArticleTypes' => ArticleTypeData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
        'getComments' => CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
