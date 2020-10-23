<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional;

use Exception;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

use function call_user_func_array;
use function get_class;

/**
 * Class ApiComponentTest
 * @package SupportPal\ApiClient\Tests\Functional
 */
abstract class ApiComponentTest extends ContainerAwareBaseTestCase
{
    use ApiDataProviders;

    protected function setUp(): void
    {
        parent::setUp();
        $this->supportPal = $this->getSupportPal();
    }

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @param array<mixed> $parameters
     * @throws Exception
     */
    public function testGetEndpoint(array $data, string $functionName, array $parameters): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($data, $this->getFormatType())
            )
        );

        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $models = call_user_func_array($callable, $parameters);
        $this->assertApiDataMatchesModels($models, $data);
    }

    /**
     * @param Model $model
     * @param array<mixed> $responseData
     * @param string $functionName
     * @throws Exception
     * @dataProvider providePostEndpointsTestCases
     */
    public function testSuccessfulPostModel(Model $model, array $responseData, string $functionName): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($responseData, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $postedModel = call_user_func_array($callable, [$model]);
        $this->assertArrayEqualsObjectFields($postedModel, $responseData['data']);
    }

    /**
     * @param Model $model
     * @param array<mixed> $modelData
     * @param array<mixed> $responseData
     * @param string $functionName
     * @throws Exception
     * @dataProvider providePutEndpointsTestCases
     */
    public function testSuccessfulPutModel(
        Model $model,
        array $modelData,
        array $responseData,
        string $functionName
    ): void {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($responseData, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $postedModel = call_user_func_array($callable, [$model, $modelData]);
        $this->assertArrayEqualsObjectFields($postedModel, $responseData['data']);
    }

    /**
     * @param Response $response
     * @param string $endpoint
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
     * @param Response $response
     * @param string $endpoint
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
     * @param Response $response
     * @param string $endpoint
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
     * @param string $modelClass
     * @param string $endpoint
     * @throws Exception
     * @dataProvider providePostEndpointsUninitializedTestCases
     */
    public function testUninitializedPostEndpoint(string $modelClass, string $endpoint): void
    {
        $model = new $modelClass;
        /** @var callable $callable */
        $callable = [$this->getApi(), $endpoint];
        $this->expectException(InvalidArgumentException::class);
        call_user_func_array($callable, [$model]);
    }

    /**
     * @param Model $model
     * @param array<mixed> $modelData
     * @param array<mixed> $responseData
     * @param string $functionName
     * @throws Exception
     * @dataProvider providePutEndpointsTestCases
     */
    public function testMissingIdentifierPostModel(
        Model $model,
        array $modelData,
        array $responseData,
        string $functionName
    ): void {
        $modelClassName = get_class($model);
        $model = new $modelClassName;
        $this->expectException(MissingIdentifierException::class);

        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($responseData, $this->getFormatType());
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        call_user_func_array($callable, [$model, $modelData]);
    }

    abstract protected function getApi(): Api;

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
