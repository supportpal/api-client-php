<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Core\Request\CreateSpamRule;
use SupportPal\ApiClient\Model\Core\Request\UpdateSpamRule;
use SupportPal\ApiClient\Model\Core\SpamRule;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateSpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateSpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SpamRuleData;

class SpamRuleApisTest extends BaseCoreApiTest
{
    public function testGetSpamRules(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SpamRuleData)->getAllResponse(), SpamRule::class);

        $this->apiClient
            ->getSpamRules([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrands = $this->api->getSpamRules();
        self::assertEquals($output, $returnedBrands);
    }

    public function testGetSpamRule(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SpamRuleData)->getResponse(), SpamRule::class);

        $this->apiClient
            ->getSpamRule(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->getSpamRule(1);
        self::assertEquals($output, $returnedBrand);
    }

    public function testCreateSpamRule(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SpamRuleData)->getResponse(), SpamRule::class);

        $createSpamRule = new CreateSpamRuleData;
        /** @var CreateSpamRule $data */
        $data = $createSpamRule->getFilledInstance();

        $this->apiClient
            ->postSpamRule($createSpamRule::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->createSpamRule($data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testUpdateSpamRule(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SpamRuleData)->getResponse(), SpamRule::class);

        $updateSpamRule = new UpdateSpamRuleData;
        /** @var UpdateSpamRule $data */
        $data = $updateSpamRule->getFilledInstance();

        $this->apiClient
            ->putSpamRule(1, $updateSpamRule::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->updateSpamRule(1, $data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testDeleteSpamRule(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteSpamRule(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteSpamRule(1);
        self::assertTrue($apiResponse);
    }
}
