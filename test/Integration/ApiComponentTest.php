<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration;

use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ApiTestCase;

abstract class ApiComponentTest extends ApiTestCase
{
    use ApiDataProviders;

    /** @var Api */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var Api $api */
        $api = $this->getContainer()->get($this->getApiClass());
        $this->api = $api;
    }

    /**
     * @return string
     */
    abstract protected function getApiClass(): string;

    /**
     * @return Api
     */
    protected function getApi(): Api
    {
        return $this->api;
    }
}
