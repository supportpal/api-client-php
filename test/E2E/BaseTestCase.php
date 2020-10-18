<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use GuzzleHttp\Client;
use PHPUnit\Framework\ExpectationFailedException;
use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use TypeError;

use function current;
use function get_class;
use function get_class_methods;
use function getenv;
use function gettype;
use function intval;
use function is_array;
use function json_decode;
use function method_exists;
use function sprintf;
use function substr;
use function var_export;

abstract class BaseTestCase extends TestCase
{
    const BATCH_SIZE = 50;

    const DEFAULT_LIMIT = self::BATCH_SIZE * 2;

    /** @var int */
    private $modelsTestLimit;

    /** @var SupportPal */
    private $supportPal;

    /** @var ModelToArrayConverter */
    private $modelToArrayConverter;

    public function setUp(): void
    {
        parent::setUp();
        /** @var string $apiUrl */
        $apiUrl = getenv('BASE_URL');
        /** @var string $token */
        $token = getenv('TOKEN');

        $limit = intval(getenv('LIMIT'));
        $this->modelsTestLimit = $limit === 0 ? self::DEFAULT_LIMIT : $limit;

        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('../Resources/services_test.yml');
        $containerBuilder->set(Client::class, new Client);
        $containerBuilder->compile();

        /** @var ModelToArrayConverter $modelConverter */
        $modelConverter = $containerBuilder->get(ModelToArrayConverter::class);
        $this->modelToArrayConverter = $modelConverter;

        $this->supportPal = new SupportPal($apiUrl, $token);
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
            $batch = $this->getSupportPal()->getApi()->{$apiCall}($parameters);
            $request = $this
                ->getSupportPal()
                ->getRequestFactory()
                ->create('GET', $endpoint, [], [], $parameters);

            $response = $this->getSupportPal()->sendRequest($request);
            $modelsArray = json_decode((string) $response->getBody(), true)['data'];

            foreach ($batch->getModels() as $offset => $value) {
                $missingMethods = [];
                $this->getMissingFields($value, $modelsArray[$offset], $missingMethods);
                try {
                    $this->assertEmpty($missingMethods, var_export($missingMethods, true));
                    $callExceptions = [];
                    $this->callAllGetters($value, $callExceptions);
                    $this->assertEmpty($callExceptions, var_export($callExceptions, true));
                    $this->assertArrayEqualsObjectFields($value, $modelsArray[$offset]);
                    $this->modelToArrayConverter->convertOne($value);
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
        $model = $this->getSupportPal()->getApi()->{$apiCall}();
        $request = $this
            ->getSupportPal()
            ->getRequestFactory()
            ->create('GET', $endpoint);
        $response = $this->getSupportPal()->sendRequest($request);
        $responseArray = json_decode((string) $response->getBody(), true)['data'];
        $this->assertInstanceOf(Settings::class, $model);
        $this->assertSame($responseArray, $model->getSettings());
        $this->modelToArrayConverter->convertOne($model);
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

                $model = $this->getSupportPal()->getApi()->{$apiCall}($iteration);
                $request = $this
                    ->getSupportPal()
                    ->getRequestFactory()
                    ->create('GET', $endpoint . '/' . $iteration);

                $response = $this->getSupportPal()->sendRequest($request);
                $responseArray = json_decode((string) $response->getBody(), true)['data'];
                $missingMethods = [];
                $this->getMissingFields($model, $responseArray, $missingMethods);
                $this->assertEmpty($missingMethods, var_export($missingMethods, true));
                $this->assertArrayEqualsObjectFields($model, $responseArray);
                $callExceptions = [];
                $this->callAllGetters($model, $callExceptions);
                $this->assertEmpty($callExceptions, var_export($callExceptions, true));
                $this->modelToArrayConverter->convertOne($model);
                ++$iteration;
            } catch (HttpResponseException $exception) {
                $this->assertStringContainsString('given ID was not found', $exception->getMessage());
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
     * @param Model $model
     * @param array<mixed> $array
     * @param string[] $output
     */
    private function getMissingFields(Model $model, array $array, array &$output): void
    {
        foreach ($array as $key => $value) {
            $methodName = 'get' . $this->snakeCaseToPascalCase($key);
            if (! method_exists($model, $methodName)) {
                $className = get_class($model);
                if (! isset($output[$className])) {
                    $output[$className] = [];
                }

                if (! isset($output[$className][$methodName])) {
                    $output[$className][$methodName] = [];
                }

                $output[$className][$methodName][] = gettype($value);

                continue;
            }

            $methodValue = $model->{$methodName}();
            if (is_array($methodValue) && current($methodValue) instanceof Model) {
                foreach ($methodValue as $offset => $subModel) {
                    $this->getMissingFields($subModel, $array[$key][$offset], $output);
                }

                continue;
            }

            if (! ($methodValue instanceof Model)) {
                continue;
            }

            $this->getMissingFields($methodValue, $array[$key], $output);
        }
    }

    /**
     * @param Model $model
     * @param string[] $exceptions
     */
    private function callAllGetters(Model $model, array &$exceptions): void
    {
        foreach (get_class_methods(get_class($model)) as $method) {
            if (substr($method, 0, 3) !== 'get') {
                continue;
            }

            try {
                $value = $model->{$method}();
            } catch (TypeError $exception) {
                $exceptions[] = $exception->getMessage();
                continue;
            }

            if (is_array($value) && current($value) instanceof Model) {
                foreach ($value as $subModel) {
                    $this->callAllGetters($subModel, $exceptions);
                }

                continue;
            }

            if (! ($value instanceof Model)) {
                continue;
            }

            $this->callAllGetters($value, $exceptions);
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
}
