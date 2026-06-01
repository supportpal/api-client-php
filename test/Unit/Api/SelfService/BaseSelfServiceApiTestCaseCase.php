<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Tests\Unit\ApiTestCase;

class BaseSelfServiceApiTestCaseCase extends ApiTestCase
{
    /** @var SelfServiceApi */
    protected $api;

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return SelfServiceApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return SelfServiceClient::class;
    }
}
