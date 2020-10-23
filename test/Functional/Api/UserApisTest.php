<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\UserApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

/**
 * Class UserApisTest
 * @package SupportPal\ApiClient\Tests\Functional\Api
 */
class UserApisTest extends ApiComponentTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return (new UserApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPostEndpoints(): array
    {
        return (new UserApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function getPutEndpoints(): array
    {
        return (new UserApisData)->putApiCalls();
    }
}
