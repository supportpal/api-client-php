<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use GuzzleHttp\Psr7\Request;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

class RequestFactoryTest extends ContainerAwareBaseTestCase
{

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var string
     */
    private $apiContentType;

    public function setUp(): void
    {
        parent::setUp();
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->getContainer()->get(RequestFactory::class);
        $this->requestFactory = $requestFactory;
        $this->apiToken = $this->getContainer()->getParameter('apiToken');
        $this->apiUrl = $this->getContainer()->getParameter('apiUrl');
        $this->apiContentType = $this->getContainer()->getParameter('apiContentType');
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
            $data['body']
        );

        $headersArray = [];
        foreach ($data['headers'] as $header => $value) {
            $headersArray[$header] = [$value];
        }
        $headersArray['Authorization'] = ['Basic ' . base64_encode($this->apiToken . ':X')];
        $headersArray['Content-Type'] = [$this->apiContentType];

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertSame($this->apiUrl . $data['endpoint'], $request->getUri()->getPath());
        self::assertSame($data['body'] ?? '', $request->getBody()->getContents());
        self::assertEquals($headersArray, $request->getHeaders());
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
            ]
        ];

        yield [
            [
                'method' => 'GET',
                'endpoint' => 'api/core',
                'headers' => ['test' => 'header'],
                'body' => null,
            ]
        ];

        yield [
            [
                'method' => 'DELETE',
                'endpoint' => 'test/api/core',
                'headers' => ['Authorization' => 'header'],
                'body' => null,
            ]
        ];
    }
}
