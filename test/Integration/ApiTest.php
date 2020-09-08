<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\Integration\Api\CoreApisTestCase;
use SupportPal\ApiClient\Tests\Integration\Api\SelfServiceApisTestCase;

class ApiTest extends ContainerAwareBaseTestCase
{
    use CoreApisTestCase;
    use SelfServiceApisTestCase;

    /**
     * @var Api
     */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->getSupportPal()->getApi();
    }
}
