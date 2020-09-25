<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class CoreApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getCoreSettings' => [CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE, []],
    ];

    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
