<?php


namespace SupportPal\ApiClient\Tests;

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
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;
}
