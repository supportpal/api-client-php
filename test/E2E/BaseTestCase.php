<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\SupportPal;
use SupportPal\ApiClient\Tests\TestCase;

abstract class BaseTestCase extends TestCase
{
    const BATCH_SIZE = 50;
    /**
     * @var SupportPal
     */
    private $supportPal;

    public function setUp(): void
    {
        parent::setUp();
        /** @var string $apiUrl */
        $apiUrl = getenv('BASE_URL');
        /** @var string $token */
        $token = getenv('TOKEN');

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
            $parameters['start'] = $start;
            $batch = $this->getSupportPal()->getApi()->{$apiCall}($parameters);
            $request = $this
                ->getSupportPal()
                ->getRequestFactory()
                ->create('GET', $endpoint, [], [], $parameters);

            $response = $this->getSupportPal()->sendRequest($request);
            $modelsArray = json_decode((string) $response->getBody(), true)['data'];

            foreach ($batch->getModels() as $offset => $value) {
                $this->callAllGetters($value);
                $this->assertArrayEqualsObjectFields($value, $modelsArray[$offset], true);
            }

            $start += $parameters['limit'];
        } while ($batch->getModelsCount() > 0);
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
                $model = $this->getSupportPal()->getApi()->{$apiCall}($iteration);
                $request = $this
                    ->getSupportPal()
                    ->getRequestFactory()
                    ->create('GET', $endpoint . '/' . $iteration);

                $response = $this->getSupportPal()->sendRequest($request);
                $responseArray = json_decode((string) $response->getBody(), true)['data'];
                $this->assertArrayEqualsObjectFields($model, $responseArray, true);
                $this->callAllGetters($model);
                ++$iteration;
            } catch (\Exception $exception) {
                $this->assertStringContainsString('given ID was not found', $exception->getMessage());
                break;
            }
        }
    }

    /**
     * @param Model $model
     */
    private function callAllGetters(Model $model): void
    {
        foreach (get_class_methods(get_class($model)) as $method) {
            if (substr($method, 0, 3) == 'get') {
                $value = $model->{$method}();
                if ($value instanceof Model) {
                    $this->callAllGetters($value);
                }
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
}
