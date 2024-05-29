<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class CategoryApisTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    public function testGetCategory(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CategoryData)->getResponse(),
            Category::class
        );

        $this
            ->apiClient
            ->getCategory(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedCategory = $this->api->getCategory(1);
        self::assertEquals($expectedOutput, $returnedCategory);
    }

    public function testGetCategories(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CategoryData)->getAllResponse(),
            Category::class
        );

        $this
            ->apiClient
            ->getCategories([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedCategories = $this->api->getCategories([]);
        self::assertEquals($expectedOutput, $returnedCategories);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return SelfServiceApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return SelfServiceClient::class;
    }
}
