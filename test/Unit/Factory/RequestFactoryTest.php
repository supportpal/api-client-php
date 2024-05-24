<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

use function array_merge;
use function base64_encode;
use function http_build_query;
use function json_decode;
use function json_encode;

/**
 * Class RequestFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\RequestFactory
 */
class RequestFactoryTest extends TestCase
{
    use PhpUnitCompatibilityTrait;

    /** @var RequestFactory */
    private $requestFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->requestFactory = new RequestFactory('test', 'test', 'test');
    }

    /**
     * @param array<mixed> $data
     * @dataProvider provideRequestWithBodyTestCases
     */
    public function testCreateRequestWithBody(array $data): void
    {
        $encodedBody = json_encode($data['body']);

        $request = $this->requestFactory->create(
            $data['method'],
            $data['endpoint'],
            $data['headers'],
            $data['body'],
            $data['parameters']
        );

        $headersArray = $this->createExpectedHeadersArray($data['headers']);

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame('test' . $data['endpoint'], $request->getUri()->getPath());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame($encodedBody, $request->getBody()->getContents());
        self::assertSame(http_build_query($data['parameters']), $request->getUri()->getQuery());
    }

    /**
     * @param array<mixed> $data
     * @dataProvider provideRequestWithoutBodyTestCases
     */
    public function testCreateRequestWithoutBody(array $data): void
    {
        $request = $this->requestFactory->create(
            $data['method'],
            $data['endpoint'],
            $data['headers'],
            $data['body'],
            $data['parameters']
        );

        $headersArray = $this->createExpectedHeadersArray($data['headers']);

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame('test' . $data['endpoint'], $request->getUri()->getPath());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame('', $request->getBody()->getContents());
        self::assertSame(http_build_query($data['parameters']), $request->getUri()->getQuery());
    }

    /**
     * @dataProvider provideRequestWithBodyTestCases
     * @param array<mixed> $data
     */
    public function testDefaultValues(array $data): void
    {
        $defaultParameters = ['testparams' => 'value', 'test_data2' => 'not_overwriten'];
        $defaultBody = ['testbody' => 'value', 'test_data2' => 'not_overwriten'];

        $this->createAndAssert($defaultBody, $data, $defaultParameters);
    }

    public function testProvidedDataOverwritesDefaults(): void
    {
        $defaultParameters = ['testparams' => 'value'];
        $defaultBody = ['testbody' => 'value'];

        $data = [
            'method' => 'DELETE',
            'endpoint' => 'test/api/core',
            'headers' => ['Authorization' => 'header'],
            'body' => ['testbody' => 'overwrite_value'],
            'parameters' => ['testparams' => 'overwrite_value']
        ];

        $this->createAndAssert($defaultBody, $data, $defaultParameters);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideRequestWithBodyTestCases(): iterable
    {
        yield [
            [
                'method' => 'POST',
                'endpoint' => 'api/comment',
                'headers' => [],
                'body' => ['test' => 'test'],
                'parameters' => []
            ]
        ];
    }

    /**
     * @return iterable<mixed>
     */
    public function provideRequestWithoutBodyTestCases(): iterable
    {
        yield [
            [
                'method' => 'GET',
                'endpoint' => 'api/core',
                'headers' => ['test' => 'header'],
                'body' => [],
                'parameters' => []
            ]
        ];

        yield [
            [
                'method' => 'DELETE',
                'endpoint' => 'test/api/core',
                'headers' => ['Authorization' => 'header'],
                'body' => [],
                'parameters' => ['test' => 'test']
            ]
        ];
    }

    /**
     * @param array<mixed> $headers
     * @return array<mixed>
     */
    private function createExpectedHeadersArray(array $headers): array
    {
        $headersArray = [];
        foreach ($headers as $header => $value) {
            $headersArray[$header] = [$value];
        }

        if (! isset($headersArray['Authorization'])) {
            $headersArray['Authorization'] = ['Basic ' . base64_encode('test' . ':X')];
        }

        if (! isset($headersArray['Content-Type'])) {
            $headersArray['Content-Type'] = ['test'];
        }

        return $headersArray;
    }

    /**
     * @param array<mixed> $expectedBody
     * @param array<mixed> $defaultBody
     * @param array<mixed> $defaultParameters
     * @param array<mixed> $data
     * @return array<mixed>
     */
    private function commonCreateRequest(
        array $expectedBody,
        array $defaultBody,
        array $defaultParameters,
        array $data
    ): array {
        $requestFactory = new RequestFactory(
            'test',
            'test',
            'test',
            $defaultBody,
            $defaultParameters
        );

        $headersArray = $this->createExpectedHeadersArray($data['headers']);
        $request = $requestFactory->create(
            $data['method'],
            $data['endpoint'],
            $data['headers'],
            $data['body'],
            $data['parameters']
        );

        return [$expectedBody, $headersArray, $request];
    }

    /**
     * @param mixed[] $defaultBody
     * @param mixed[] $data
     * @param mixed[] $defaultParameters
     * @return void
     */
    private function createAndAssert(array $defaultBody, array $data, array $defaultParameters): void
    {
        $expectedBody = array_merge($defaultBody, $data['body']);
        [$encodedBody, $headersArray, $request] = $this
            ->commonCreateRequest($expectedBody, $defaultBody, $defaultParameters, $data);

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame('test' . $data['endpoint'], $request->getUri()->getPath());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame($encodedBody, json_decode($request->getBody()->getContents(), true));
        self::assertSame(
            http_build_query(array_merge($defaultParameters, $data['parameters'])),
            $request->getUri()->getQuery()
        );
    }
}
