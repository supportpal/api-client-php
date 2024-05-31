<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;

class TagApisTest extends BaseSelfServiceApiTest
{
    public function testGetTags(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TagData)->getAllResponse(), Tag::class);

        $this->apiClient
            ->getTags([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $tags = $this->api->getTags();
        self::assertEquals($output, $tags);
    }

    public function testGetTag(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TagData)->getResponse(), Tag::class);

        $this->apiClient
            ->getTag(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tag = $this->api->getTag(1);
        self::assertEquals($output, $tag);
    }
}
