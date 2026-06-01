<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\User;

use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\Unit\ApiTestCase;

class BaseUserApiTestCase extends ApiTestCase
{
    /** @var UserApi */
    protected $api;

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return UserApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
