<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;

class TypeApiTest extends BaseSelfServiceApiTest
{
    public function testGetTypes(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TypeData)->getAllResponse(), Type::class);

        $this->apiClient
            ->getTypes([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $articleTypes = $this->api->getTypes();
        self::assertEquals($output, $articleTypes);
    }

    public function testGetType(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TypeData)->getResponse(), Type::class);

        $this->apiClient
            ->getType(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $types = $this->api->getType(1);
        self::assertEquals($output, $types);
    }
}
