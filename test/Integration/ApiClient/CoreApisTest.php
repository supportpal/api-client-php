<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
class CoreApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getCoreSettings' => [CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE, []],
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
