<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Model\User\Operator;
use SupportPal\ApiClient\Model\User\Request\CreateOperator;
use SupportPal\ApiClient\Model\User\Request\UpdateOperator;
use SupportPal\ApiClient\Tests\DataFixtures\User\OperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\CreateOperatorData;
use SupportPal\ApiClient\Tests\DataFixtures\User\Request\UpdateOperatorData;

class OperatorApisTest extends BaseUserApiTest
{
    public function testGetOperators(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new OperatorData)->getAllResponse(), Operator::class);

        $this->apiClient
            ->getOperators([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $operators = $this->api->getOperators();
        self::assertEquals($output, $operators);
    }

    public function testGetOperator(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new OperatorData)->getResponse(), Operator::class);

        $this->apiClient
            ->getOperator(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $operator = $this->api->getOperator(1);
        self::assertEquals($output, $operator);
    }

    public function testCreateOperator(): void
    {
        $operatorData = new OperatorData;
        $createOperatorData = new CreateOperatorData;
        $arrayData = $createOperatorData::DATA;
        [$operatorOutput, $response] = $this->makeCommonExpectations($operatorData->getResponse(), Operator::class);

        $this->apiClient
            ->postOperator($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $operator = $this->api->createOperator(new CreateOperator($arrayData));
        self::assertEquals($operatorOutput, $operator);
    }

    public function testUpdateOperator(): void
    {
        $operatorData = new OperatorData;
        $updateOperator = new UpdateOperator(UpdateOperatorData::DATA);

        [$output, $response] = $this->makeCommonExpectations($operatorData->getResponse(), Operator::class);

        $this->apiClient
            ->putOperator(self::TEST_ID, $updateOperator->toArray())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $operator = $this->api->updateOperator(self::TEST_ID, $updateOperator);
        self::assertEquals($output, $operator);
    }

    public function testDeleteOperator(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteOperator(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteOperator(1);
        self::assertTrue($apiResponse);
    }
}
