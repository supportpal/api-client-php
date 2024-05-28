<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;

use function current;
use function is_array;
use function json_encode;

abstract class ApiTest extends TestCase
{
    protected const TEST_ID = 1;

    /** @var ObjectProphecy|Client */
    protected $apiClient;

    /** @var Api */
    protected $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->apiClient = $this->prophesize($this->getApiClientName());

        /** @var Client $apiClient */
        $apiClient = $this->apiClient->reveal();

        $apiName = $this->getApiName();
        $this->api = new $apiName($apiClient);
    }

    /**
     * @param array<mixed> $responseData
     * @param class-string $model
     * @return array<mixed>
     */
    protected function makeCommonExpectations(array $responseData, string $model): array
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()
            ->willReturn(json_encode($responseData));

        if (is_array(current($responseData['data']))) {
            $models = [];
            foreach ($responseData['data'] as $value) {
                /** @var Model $model */
                $model = new $model($value);

                $models[] = $model;
            }

            $collection = $this->api->createCollection($responseData['count'], $models);

            return [$collection, $response];
        }

        return [new $model($responseData['data']), $response];
    }

    /**
     * @param array<mixed> $responseData
     * @param class-string $model
     * @return array<mixed>
     */
    protected function postCommonExpectations(
        array $responseData,
        string $model
    ): array {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()
            ->willReturn(json_encode($responseData));

        return [$response, new $model($responseData['data'])];
    }

    /**
     * @return class-string<Api>
     */
    abstract protected function getApiName(): string;

    /**
     * @return class-string<Client>
     */
    abstract protected function getApiClientName(): string;
}
