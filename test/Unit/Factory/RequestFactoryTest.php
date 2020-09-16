<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Factory\RequestFactory;

class RequestFactoryTest extends TestCase
{

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->requestFactory = new RequestFactory('test', 'test', 'test');
    }

    /**
     * @param array<mixed> $data
     * @dataProvider provideRequestTestCases
     */
    public function testCreateRequest(array $data): void
    {
        $request = $this->requestFactory->create(
            $data['method'],
            $data['endpoint'],
            $data['headers'],
            $data['body'],
            $data['parameters']
        );

        $headersArray = [];
        foreach ($data['headers'] as $header => $value) {
            $headersArray[$header] = [$value];
        }
        $headersArray['Authorization'] = ['Basic ' . base64_encode('test' . ':X')];
        $headersArray['Content-Type'] = ['test'];
        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame('test' . $data['endpoint'], $request->getUri()->getPath());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame($data['body'] ?? '', $request->getBody()->getContents());
        self::assertSame(http_build_query($data['parameters']), $request->getUri()->getQuery());
    }

    /**
     * @return iterable<mixed>
     */
    public function provideRequestTestCases(): iterable
    {
        yield [
            [
                'method' => 'POST',
                'endpoint' => 'api/comment',
                'headers' => [],
                'body' => json_encode(['test' => 'test']),
                'parameters' => []
            ]
        ];

        yield [
            [
                'method' => 'GET',
                'endpoint' => 'api/core',
                'headers' => ['test' => 'header'],
                'body' => null,
                'parameters' => []
            ]
        ];

        yield [
            [
                'method' => 'DELETE',
                'endpoint' => 'test/api/core',
                'headers' => ['Authorization' => 'header'],
                'body' => null,
                'parameters' => ['test' => 'test']
            ]
        ];
    }
}
