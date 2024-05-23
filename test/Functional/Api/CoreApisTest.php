<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\CoreApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class CoreApisTest extends ApiComponentTest
{
    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @param array<mixed> $parameters
     * @throws Exception
     */
    public function testGetEndpoint(array $data, string $functionName, array $parameters): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($data, $this->getFormatType())
            )
        );

        /** @var callable $callable */
        $callable = [$this->getApi(), $functionName];
        $models = call_user_func_array($callable, $parameters);
        $this->assertApiDataMatchesModels($models, $data);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new CoreApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getDownloadsEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function getApi(): Api
    {
        return $this->supportPal->getCoreApi();
    }
}
