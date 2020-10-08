<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class TypeApiTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\TypeApis
 * @covers \SupportPal\ApiClient\Api
 */
class TypeApiTest extends ApiTest
{
    public function testGetArticleTypes(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            TypeData::GET_TYPES_SUCCESSFUL_RESPONSE,
            Type::class
        );

        $this
            ->apiClient
            ->getTypes([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $articleTypes = $this->api->getTypes();
        self::assertSame($expectedOutput, $articleTypes);
    }
}
