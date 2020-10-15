<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use function current;

trait ApiDataProviders
{
    /**
     * @return iterable<mixed>
     */
    public function provideGetEndpointsTestCases(): iterable
    {
        foreach ($this->getGetEndpoints() as $endpoint => $value) {
            [$data, $parameters] = $value;

            yield [$data, $endpoint, $parameters];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideGetEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach ($this->getGetEndpoints() as $endpoint => $value) {
            [$_, $parameters] = $value;
            foreach ($this->provideUnsuccessfulTestCases() as $testCase) {
                yield [current($testCase), $endpoint, $parameters];
            }
        }
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;

    /**
     * @return iterable<mixed>
     */
    abstract protected function provideUnsuccessfulTestCases(): iterable;
}
