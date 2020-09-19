<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

class ApiTest extends ContainerAwareBaseTestCase
{
    /**
     * @var Api
     */
    protected $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->getSupportPal()->getApi();
    }
}
