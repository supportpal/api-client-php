<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;

class CategoryApisTest extends BaseSelfServiceApiTest
{
    public function testGetCategories(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new CategoryData)->getAllResponse(), Category::class);

        $this->apiClient
            ->getCategories([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedCategories = $this->api->getCategories();
        self::assertEquals($output, $returnedCategories);
    }

    public function testGetCategory(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new CategoryData)->getResponse(), Category::class);

        $this->apiClient
            ->getCategory(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedCategory = $this->api->getCategory(1);
        self::assertEquals($output, $returnedCategory);
    }
}
