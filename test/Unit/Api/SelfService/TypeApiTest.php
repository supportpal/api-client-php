<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class TypeApiTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\TypeApis
 * @covers \SupportPal\ApiClient\Api\Api
 */
class TypeApiTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    public function testGetArticleTypes(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TypeData)->getAllResponse(),
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

    public function testGetType(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TypeData)->getResponse(),
            Type::class
        );

        $this
            ->apiClient
            ->getType(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $types = $this->api->getType(1);
        self::assertSame($expectedOutput, $types);
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
