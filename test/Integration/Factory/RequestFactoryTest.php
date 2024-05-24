<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use Exception;
use GuzzleHttp\Psr7\Request;
use ReflectionException;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

use function array_merge;
use function base64_encode;
use function http_build_query;
use function json_encode;

/**
 * Class RequestFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
class RequestFactoryTest extends ContainerAwareBaseTestCase
{
    /** @var RequestFactory */
    private $requestFactory;

    /** @var string */
    private $apiToken;

    /** @var string */
    private $apiContentType;

    /** @var array<mixed> */
    private $defaultBodyContent;

    /** @var array<mixed> */
    private $defaultParameters;

    public function setUp(): void
    {
        parent::setUp();
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->getContainer()->get(RequestFactory::class);
        $this->requestFactory = $requestFactory;
        /** @var string $apiToken */
        $apiToken = $this->getContainer()->getParameter('apiToken');
        $this->apiToken = $apiToken;
        /** @var string $apiContentType */
        $apiContentType = $this->getContainer()->getParameter('apiContentType');
        $this->apiContentType = $apiContentType;
        /** @var array<mixed> $defaultBodyContent */
        $defaultBodyContent = $this->getContainer()->getParameter('defaultBodyContent');
        $this->defaultBodyContent = $defaultBodyContent;
        /** @var array<mixed> $defaultParameters */
        $defaultParameters = $this->getContainer()->getParameter('defaultParameters');
        $this->defaultParameters = $defaultParameters;
    }

    /**
     * @param array<mixed> $data
     * @dataProvider provideRequestTestCases
     * @throws Exception
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

        if (! isset($headersArray['Authorization'])) {
            $headersArray['Authorization'] = ['Basic ' . base64_encode($this->apiToken . ':X')];
        }

        if (! isset($headersArray['Content-Type'])) {
            $headersArray['Content-Type'] = [$this->apiContentType];
        }

        $headersArray['Host'] = [$request->getUri()->getHost() . ':' . $request->getUri()->getPort()];

        $encodedBody = ! empty($data['body']) || ! empty($this->defaultBodyContent)
            ? json_encode(array_merge($data['body'], $this->defaultBodyContent))
            : '';

        self::assertInstanceOf(Request::class, $request);
        self::assertSame($data['method'], $request->getMethod());
        self::assertStringContainsString($data['endpoint'], $request->getUri()->getPath());
        self::assertSame($encodedBody, $request->getBody()->getContents());
        self::assertEquals($headersArray, $request->getHeaders());
        self::assertSame(
            http_build_query(array_merge($data['parameters'], $this->defaultParameters)),
            $request->getUri()->getQuery()
        );
    }

    /**
     * @return iterable<mixed>
     * @throws ReflectionException
     */
    public function provideRequestTestCases(): iterable
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

        yield [
            [
                'method' => 'GET',
                'endpoint' => 'api/core',
                'headers' => ['test' => 'header'],
                'body' => [],
                'parameters' => ['test' => 'test']
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
}
