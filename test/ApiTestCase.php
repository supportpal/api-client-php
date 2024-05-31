<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use Exception;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Model\Model;

use function call_user_func_array;
use function json_encode;

abstract class ApiTestCase extends ContainerAwareBaseTestCase
{
    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param array<mixed> $parameters
     * @throws Exception
     */
    public function testGetEndpoint(array $data, string $functionName, array $parameters): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) json_encode($data)
            )
        );

        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $models = call_user_func_array($callable, $parameters);
        $this->assertApiDataMatchesModels($models, $data);
    }

    /**
     * @param Response $response
     * @param array<mixed> $parameters
     * @throws Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @param array<mixed> $responseData
     * @throws Exception
     * @dataProvider providePostEndpointsTestCases
     */
    public function testSuccessfulPostEndpoint(Model $model, array $responseData, string $functionName): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($responseData);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $postedModel = call_user_func_array($callable, [$model]);
        $this->assertArrayEqualsObjectFields($postedModel, $responseData['data']);
    }

    /**
     * @param array<mixed> $parameters
     * @throws Exception
     * @dataProvider providePostEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @param array<mixed> $responseData
     * @throws Exception
     * @dataProvider providePutEndpointsTestCases
     */
    public function testSuccessfulPutEndpoint(
        int $id,
        Model $model,
        array $responseData,
        string $functionName
    ): void {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($responseData);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $postedModel = call_user_func_array($callable, [$id, $model]);
        $this->assertArrayEqualsObjectFields($postedModel, $responseData['data']);
    }

    /**
     * @param array<mixed> $parameters
     * @throws Exception
     * @dataProvider providePutEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulPutEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @throws Exception
     * @dataProvider provideDeleteEndpointsTestCases
     */
    public function testSuccessfulDeleteEndpoint(int $id, string $functionName): void {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode(['status' => 'success']);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $this->assertTrue(call_user_func_array($callable, [$id]));
    }

    /**
     * @param array<mixed> $parameters
     * @throws Exception
     * @dataProvider provideDeleteEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulDeleteEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @dataProvider provideDownloadEndpointsTestCases
     */
    public function testDownloadEndpoint(Model $model, string $functionName): void
    {
        $this->appendRequestResponse(new Response(200, ['Content-Disposition' => 'test'], ''));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $stream = call_user_func_array($callable, [$model]);
        self::assertInstanceOf(StreamInterface::class, $stream);
    }

    /**
     * @param array<mixed> $parameters
     * @dataProvider provideDownloadUnsuccessfulTestCases
     * @throws Exception
     */
    public function testUnsuccessfulDownloadEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    abstract protected function getApi(): Api;
}
