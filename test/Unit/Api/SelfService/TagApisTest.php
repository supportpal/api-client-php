<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class TagApisTest extends ApiTest
{
    public function testGetComments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            TagData::GET_TAG_SUCCESSFUL_RESPONSE,
            Tag::class
        );

        $this
            ->apiClient
            ->getTag(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $comments = $this->api->getTag(1);
        self::assertSame($expectedOutput, $comments);
    }
}
