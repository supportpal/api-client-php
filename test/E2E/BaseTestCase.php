<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use GuzzleHttp\Client;
use PHPUnit\Framework\ExpectationFailedException;
use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Config\ApiContext;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use function getenv;
use function intval;
use function json_decode;
use function sprintf;

abstract class BaseTestCase extends TestCase
{
    const BATCH_SIZE = 50;

    const DEFAULT_LIMIT = self::BATCH_SIZE * 2;

    private int $modelsTestLimit;

    private SupportPal $supportPal;

    public function setUp(): void
    {
        parent::setUp();
        /** @var string $apiUrl */
        $apiUrl = getenv('URL');
        /** @var string $token */
        $token = getenv('TOKEN');

        $limit = intval(getenv('LIMIT'));
        $this->modelsTestLimit = $limit === 0 ? self::DEFAULT_LIMIT : $limit;

        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('../Resources/services_test.yml');
        $containerBuilder->set(Client::class, new Client);
        $containerBuilder->compile();

        $apiContext = ApiContext::createFromUrl($apiUrl, $token);

        $this->supportPal = new SupportPal($apiContext);
    }

    protected function getSupportPal(): SupportPal
    {
        return $this->supportPal;
    }

    /**
     * @param string $endpoint
     * @param string $apiCall
     * @throws HttpResponseException
     * @dataProvider provideGetAllEndpoints
     */
    public function testGetAll(string $endpoint, string $apiCall): void
    {
        $start = 1;
        $parameters = ['limit' => self::BATCH_SIZE];
        do {
            if ($start > $this->modelsTestLimit) {
                break;
            }

            $parameters['start'] = $start;
            $batch = $this->getApi()->{$apiCall}($parameters);
            $request = $this
                ->getSupportPal()
                ->getRequest()
                ->create('GET', $endpoint, [], [], $parameters);

            $response = $this->getSupportPal()->sendRequest($request);
            $modelsArray = json_decode((string) $response->getBody(), true)['data'];

            foreach ($batch->getModels() as $offset => $value) {
                try {
                    $this->assertArrayEqualsObjectFields($value, $modelsArray[$offset]);
                } catch (ExpectationFailedException $exception) {
                    throw new ExpectationFailedException(
                        sprintf('test failed in range start: %d, end: %d', $start, $start + self::BATCH_SIZE),
                        $exception->getComparisonFailure(),
                        $exception
                    );
                }
            }

            $start += $parameters['limit'];
        } while ($batch->getModelsCount() > 0);
    }

    protected function settingsTestCase(string $endpoint, string $apiCall): void
    {
        $model = $this->getApi()->{$apiCall}();
        $request = $this
            ->getSupportPal()
            ->getRequest()
            ->create('GET', $endpoint);
        $response = $this->getSupportPal()->sendRequest($request);
        $responseArray = json_decode((string) $response->getBody(), true)['data'];
        self::assertInstanceOf(Settings::class, $model);
        self::assertSame($responseArray, $model);
    }

    /**
     * @param string $endpoint
     * @param string $apiCall
     * @dataProvider provideGetByIdEndpoints
     */
    public function testGetOneById(string $endpoint, string $apiCall): void
    {
        $iteration = 1;
        while (true) {
            try {
                if ($iteration > $this->modelsTestLimit) {
                    break;
                }

                $model = $this->getApi()->{$apiCall}($iteration);
                $request = $this
                    ->getSupportPal()
                    ->getRequest()
                    ->create('GET', $endpoint . '/' . $iteration);

                $response = $this->getSupportPal()->sendRequest($request);
                $responseArray = json_decode((string) $response->getBody(), true)['data'];
                $this->assertArrayEqualsObjectFields($model, $responseArray);
                ++$iteration;
            } catch (HttpResponseException $exception) {
                self::assertStringContainsString('given ID was not found', $exception->getMessage());
                break;
            } catch (ExpectationFailedException $exception) {
                throw new ExpectationFailedException(
                    sprintf('test failed for model id: %d', $iteration),
                    $exception->getComparisonFailure(),
                    $exception
                );
            }
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideGetAllEndpoints(): iterable
    {
        foreach ($this->getGetAllEndpoints() as $endpoint => $apiCall) {
            yield [$endpoint, $apiCall];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideGetByIdEndpoints(): iterable
    {
        foreach ($this->getGetByIdEndpoints() as $endpoint => $apiCall) {
            yield [$endpoint, $apiCall];
        }
    }

    /**
     * @return string[]
     */
    abstract protected function getGetAllEndpoints(): array;

    /**
     * @return string[]
     */
    abstract protected function getGetByIdEndpoints(): array;

    /**
     * @return UserApi|SelfServiceApi|TicketApi|CoreApi
     */
    abstract protected function getApi();
}
