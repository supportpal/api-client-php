<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CategoryApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\CategoryApis
 * @covers \SupportPal\ApiClient\Api\Api
 */
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
        self::assertSame($expectedOutput, $returnedCategory);
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
        self::assertSame($expectedOutput, $returnedCategories);
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
        return SelfServiceApiClient::class;
    }
}
