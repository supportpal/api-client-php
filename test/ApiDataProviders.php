<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use function current;
use function next;

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
            $parameters = next($value);
            foreach ($this->provideUnsuccessfulResponses() as $testCase) {
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
            $model = current($value);
            foreach ($this->provideUnsuccessfulResponses() as $testCase) {
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
            foreach ($this->provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$model, $data]];
            }
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
     * @return iterable<mixed>
     */
    public function provideDownloadEndpointsTestCases(): iterable
    {
        foreach ($this->getDownloadsEndpoints() as $endpoint => $model) {
            yield [$model, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDownloadUnsuccessfulTestCases(): iterable
    {
        foreach ($this->getDownloadsEndpoints() as $endpoint => $model) {
            foreach ($this->provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$model]];
            }
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
     * @return array<mixed>
     */
    abstract protected function getDownloadsEndpoints(): array;

    /**
     * @return iterable<mixed>
     */
    abstract protected function provideUnsuccessfulResponses(): iterable;
}
