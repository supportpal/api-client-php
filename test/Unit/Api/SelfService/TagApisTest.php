<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class TagApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\TagApis
 * @covers \SupportPal\ApiClient\Api
 */
class TagApisTest extends ApiTest
{
    public function testGetComments(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TagData)->getResponse(),
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
