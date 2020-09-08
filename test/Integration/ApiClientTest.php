<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\Integration\ApiClient\CoreApisTestCase;
use SupportPal\ApiClient\Tests\Integration\ApiClient\SelfServiceApisTestCase;

class ApiClientTest extends ContainerAwareBaseTestCase
{
    use CoreApisTestCase;
    use SelfServiceApisTestCase;

    /**
     * @var ApiClient
     */
    private $apiClient;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get(ApiClient::class);
        $this->apiClient = $apiClient;
    }
}
