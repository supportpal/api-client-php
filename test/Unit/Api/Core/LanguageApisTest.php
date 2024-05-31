<?php declare(strict_types=1);

namespace Api\Core;

use SupportPal\ApiClient\Model\Core\Language;
use SupportPal\ApiClient\Tests\DataFixtures\Core\LanguageData;
use SupportPal\ApiClient\Tests\Unit\Api\Core\BaseCoreApiTest;

class LanguageApisTest extends BaseCoreApiTest
{
    public function testGetLanguages(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new LanguageData)->getAllResponse(), Language::class);

        $this->apiClient
            ->getLanguages([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedModels = $this->api->getLanguages();
        self::assertEquals($output, $returnedModels);
    }
}
