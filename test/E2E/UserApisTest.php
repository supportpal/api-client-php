<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

class UserApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::USER_USER => 'getUsers',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetByIdEndpoints(): array
    {
        return [];
    }
}
