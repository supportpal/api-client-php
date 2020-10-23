<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use function current;
use function get_class;

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
     * @return iterable<mixed>
     */
    public function providePostEndpointsTestCases(): iterable
    {
        foreach ($this->getPostEndpoints() as $endpoint => $value) {
            [$model, $data] = $value;

            yield [$model, $data, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function providePutEndpointsTestCases(): iterable
    {
        foreach ($this->getPutEndpoints() as $endpoint => $value) {
            [$model, $data, $response] = $value;

            yield [$model, $data, $response, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function providePostEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach ($this->getPostEndpoints() as $endpoint => $value) {
            [$model, $_] = $value;
            foreach ($this->provideUnsuccessfulTestCases() as $testCase) {
                yield [current($testCase), $endpoint, [$model]];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function providePutEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach ($this->getPutEndpoints() as $endpoint => $value) {
            [$model, $data] = $value;
            foreach ($this->provideUnsuccessfulTestCases() as $testCase) {
                yield [current($testCase), $endpoint, [$model, $data]];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function providePostEndpointsUninitializedTestCases(): iterable
    {
        foreach ($this->getPostEndpoints() as $endpoint => $value) {
            [$model, $_] = $value;

            yield [get_class($model), $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideApiClientPutEndpointsTestCases(): iterable
    {
        foreach ($this->getPutEndpoints() as $endpoint => $value) {
            [$data, $response] = $value;

            yield [$data, $response, $endpoint];
        }
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getGetEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected function getPostEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected function getPutEndpoints(): array;

    /**
     * @return iterable<mixed>
     */
    abstract protected function provideUnsuccessfulTestCases(): iterable;
}
