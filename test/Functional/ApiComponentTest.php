<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional;

use SupportPal\ApiClient\Tests\ApiTestCase;

abstract class ApiComponentTest extends ApiTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->supportPal = $this->getSupportPal();
    }
}
