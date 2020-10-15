<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CategoryApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\CategoryApis
 * @covers \SupportPal\ApiClient\Api
 */
class CategoryApisTest extends ApiTest
{
    public function testGetCategory(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            CategoryData::getResponse(),
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
            CategoryData::getAllResponse(),
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
}
