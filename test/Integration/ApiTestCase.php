<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

/**
 * Class ApiTestCase
 * @package SupportPal\ApiClient\Tests
 * @coversNothing
 */
abstract class ApiTestCase extends ContainerAwareBaseTestCase
{
    use ApiDataProviders;

    /**
     * @var Api
     */
    protected $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->getContainer()->get(Api::class);
    }

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @param array $parameters
     * @throws \Exception
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

        $models = call_user_func_array([$this->api, $functionName], $parameters);
        if (is_array($models)) {
            foreach ($models as $offset => $object) {
                $this->assertArrayEqualsObjectFields($object, $data['data'][$offset]);
            }
        } else {
            $this->assertArrayEqualsObjectFields($models, $data['data']);
        }
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array $parameters
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        call_user_func_array([$this->api, $endpoint], $parameters);
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
