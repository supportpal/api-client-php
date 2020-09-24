<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

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

        $models = call_user_func_array([$this->supportPal->getApi(), $functionName], $parameters);
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
        call_user_func_array([$this->supportPal->getApi(), $endpoint], $parameters);
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
