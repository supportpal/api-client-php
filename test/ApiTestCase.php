<?php


namespace SupportPal\ApiClient\Tests;

use GuzzleHttp\Psr7\Response;

abstract class ApiTestCase extends ContainerAwareBaseTestCase
{
    /**
     * @return iterable<mixed>
     */
    public function provideGetEndpointsTestCases(): iterable
    {
        foreach ($this->getGetEndpoints() as $endpoint => $data) {
            yield [$data, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideGetEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach ($this->getGetEndpoints() as $endpoint => $_) {
            foreach ($this->provideUnsuccessfulTestCases() as $testCase) {
                yield [current($testCase), $endpoint];
            }
        }
    }

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @throws \Exception
     */
    public function testGetEndpoint(array $data, string $functionName): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($data, $this->getFormatType())
            )
        );

        $models = $this->getSupportPal()->getApi()->{$functionName}();
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
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->getSupportPal()->getApi()->{$endpoint}();
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
