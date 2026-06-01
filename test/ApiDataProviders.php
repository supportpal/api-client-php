<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use function current;
use function next;

trait ApiDataProviders
{
    /**
     * @return iterable<mixed>
     */
    public static function provideGetEndpointsTestCases(): iterable
    {
        foreach (static::getGetEndpoints() as $endpoint => $value) {
            [$data, $parameters] = $value;

            yield [$data, $endpoint, $parameters];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideGetEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach (static::getGetEndpoints() as $endpoint => $value) {
            $parameters = next($value);
            foreach (static::provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, $parameters];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function providePostEndpointsTestCases(): iterable
    {
        $endpoints = static::getPostEndpoints();
        if (empty($endpoints)) {
            yield [null, null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $value) {
            [$model, $data] = $value;

            yield [$model, $data, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function providePutEndpointsTestCases(): iterable
    {
        foreach (static::getPutEndpoints() as $endpoint => $value) {
            [$model, $data, $response] = $value;

            yield [$model, $data, $response, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function providePostEndpointsUnsuccessfulTestCases(): iterable
    {
        $endpoints = static::getPostEndpoints();
        if (empty($endpoints)) {
            yield [null, null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $value) {
            $model = current($value);
            foreach (static::provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$model]];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function providePutEndpointsUnsuccessfulTestCases(): iterable
    {
        $endpoints = static::getPutEndpoints();
        if (empty($endpoints)) {
            yield [null, null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $value) {
            [$model, $data] = $value;
            foreach (static::provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$model, $data]];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideApiClientPutEndpointsTestCases(): iterable
    {
        $endpoints = static::getPutEndpoints();
        if (empty($endpoints)) {
            yield [null, null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $value) {
            [$data, $response] = $value;

            yield [$data, $response, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideDeleteEndpointsUnsuccessfulTestCases(): iterable
    {
        foreach (static::getDeleteEndpoints() as $endpoint => $id) {
            foreach (static::provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$id]];
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideDeleteEndpointsTestCases(): iterable
    {
        foreach (static::getDeleteEndpoints() as $endpoint => $id) {
            yield [$id, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideDownloadEndpointsTestCases(): iterable
    {
        $endpoints = static::getDownloadsEndpoints();
        if (empty($endpoints)) {
            yield [null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $model) {
            yield [$model, $endpoint];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public static function provideDownloadUnsuccessfulTestCases(): iterable
    {
        $endpoints = static::getDownloadsEndpoints();
        if (empty($endpoints)) {
            yield [null, null, null];

            return;
        }

        foreach ($endpoints as $endpoint => $model) {
            foreach (static::provideUnsuccessfulResponses() as $testCase) {
                yield [current($testCase), $endpoint, [$model]];
            }
        }
    }

    /**
     * @return array<mixed>
     */
    abstract protected static function getGetEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected static function getPostEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected static function getPutEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected static function getDeleteEndpoints(): array;

    /**
     * @return array<mixed>
     */
    abstract protected static function getDownloadsEndpoints(): array;

    /**
     * @return iterable<mixed>
     */
    abstract protected static function provideUnsuccessfulResponses(): iterable;
}
