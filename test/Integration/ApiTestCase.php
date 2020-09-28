<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

/**
 * Class ApiTestCase
 * @package SupportPal\ApiClient\Tests
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
        /** @var Api $api */
        $api = $this->getContainer()->get(Api::class);
        $this->api = $api;
    }

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @param array<mixed> $parameters
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

        /** @var callable $callable */
        $callable = [$this->api, $functionName];
        $models = call_user_func_array($callable, $parameters);
        if ($models instanceof Collection) {
            self::assertSame($data['count'], $models->getCount());
            foreach ($models->getModels() as $offset => $object) {
                $this->assertArrayEqualsObjectFields($object, $data['data'][$offset]);
            }
        } else {
            $this->assertArrayEqualsObjectFields($models, $data['data']);
        }
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->api, $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
