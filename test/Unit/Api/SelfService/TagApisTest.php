<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class TagApisTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    public function testGetTag(): void
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

        $tag = $this->api->getTag(1);
        self::assertEquals($expectedOutput, $tag);
    }

    public function testGetTags(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TagData)->getAllResponse(),
            Tag::class
        );

        $this
            ->apiClient
            ->getTags([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $tags = $this->api->getTags([]);
        self::assertEquals($expectedOutput, $tags);
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
