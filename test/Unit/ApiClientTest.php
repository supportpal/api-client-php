<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\Unit\ApiClient\CoreApisTestCase;
use SupportPal\ApiClient\Tests\Unit\ApiClient\SelfServiceApisTestCase;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

class ApiClientTest extends TestCase
{
    use CoreApisTestCase;
    use SelfServiceApisTestCase;

    /**
     * @var array<mixed>
     */
    private $genericErrorResponse = [
        'status' => 'error',
        'message' => null,
        'data' => []
    ];

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $httpClient;
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $requestFactory;
    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $decoder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->httpClient = $this->prophesize(ClientInterface::class);
        $this->requestFactory = $this->prophesize(RequestFactory::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);

        /** @var Client $httpClient */
        $httpClient = $this->httpClient->reveal();
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->requestFactory->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        $this->apiClient = new ApiClient(
            $httpClient,
            $requestFactory,
            $decoder,
            'json'
        );
    }

    /**
     * @return iterable<mixed>
     */
    public function provideUnsuccessfulTestCases(): iterable
    {

        $jsonErrorBody = $this->genericErrorResponse;
        $jsonErrorBody['status'] = 'success';
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($jsonErrorBody);
        yield ['error 400 response' => 400, $jsonSuccessfulBody];
        yield ['error 401 response' => 401, $jsonSuccessfulBody];
        yield ['error 403 response' => 403, $jsonSuccessfulBody];
        yield ['error 404 response' => 404, $jsonSuccessfulBody];

        /** @var string $jsonErrorBody */
        $jsonErrorBody = json_encode($this->genericErrorResponse);
        yield [
            'error status response' => 200, $jsonErrorBody,
        ];
    }
}
