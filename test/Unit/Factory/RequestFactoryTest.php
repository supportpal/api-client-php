<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

use function array_merge;
use function base64_encode;
use function http_build_query;
use function json_encode;

/**
 * Class RequestFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\RequestFactory
 */
class RequestFactoryTest extends TestCase
{
    /** @var RequestFactory */
    private $requestFactory;

    /** @var ObjectProphecy */
    private $encoder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->encoder = $this->prophesize(EncoderInterface::class);
        /** @var EncoderInterface $encoder */
        $encoder = $this->encoder->reveal();
        $this->requestFactory = new RequestFactory('test', 'test', 'test', 'json', $encoder);
    }

    /**
     * @param array<mixed> $data
     * @dataProvider provideRequestWithBodyTestCases
     */
    public function testCreateRequestWithBody(array $data): void
    {
        $encodedBody = json_encode($data['body']);
        $this->encoder->encode($data['body'], 'json')->shouldBeCalled()->willReturn($encodedBody);

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
        $this->encoder->encode(Argument::any())->shouldNotBeCalled();
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
        $defaultParameters = ['testparams' => 'value'];
        $defaultBody = ['testbody' => 'value'];

        $expectedBody = array_merge($data['body'], $defaultBody);
        $encodedBody = json_encode($expectedBody);
        $encoder = $this->prophesize(EncoderInterface::class);
        $encoder->encode($expectedBody, 'json')->shouldBeCalled()->willReturn($encodedBody);

        /** @var EncoderInterface $encoder */
        $encoder = $encoder->reveal();
        $requestFactory = new RequestFactory(
            'test',
            'test',
            'test',
            'json',
            $encoder,
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

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame('test' . $data['endpoint'], $request->getUri()->getPath());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame($encodedBody, $request->getBody()->getContents());
        self::assertSame(
            http_build_query(array_merge($data['parameters'], $defaultParameters)),
            $request->getUri()->getQuery()
        );
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

        $headersArray['Authorization'] = ['Basic ' . base64_encode('test' . ':X')];
        $headersArray['Content-Type'] = ['test'];

        return $headersArray;
    }
}
