<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

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
        $callable = [$this->supportPal->getApi(), $functionName];
        $models = call_user_func_array($callable, $parameters);
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
     * @param array<mixed> $parameters
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        /** @var callable $callable */
        $callable = [$this->supportPal->getApi(), $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
