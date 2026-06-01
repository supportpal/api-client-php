<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Tests\Unit\ApiTestCase;

class BaseCoreApiTestCaseCase extends ApiTestCase
{
    /** @var CoreApi */
    protected $api;

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return CoreApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return CoreClient::class;
    }
}
