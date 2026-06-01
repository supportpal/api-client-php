<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use Exception;
use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Tests\DataFixtures\ApiCalls\UserApisData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTestCase;

class UserApisTest extends ApiComponentTestCase
{
    /**
     * @inheritDoc
     */
    protected static function getGetEndpoints(): array
    {
        return (new UserApisData)->getApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected static function getPostEndpoints(): array
    {
        return (new UserApisData)->postApiCalls();
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected static function getPutEndpoints(): array
    {
        return (new UserApisData)->putApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getDeleteEndpoints(): array
    {
        return (new UserApisData)->deleteApiCalls();
    }

    /**
     * @inheritDoc
     */
    protected static function getDownloadsEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function getApi(): Api
    {
        return $this->supportPal->getUserApi();
    }
}
