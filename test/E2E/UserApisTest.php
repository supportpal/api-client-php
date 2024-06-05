<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Api\UserApi;
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
            ApiDictionary::USER_USERGROUP => 'getGroups',
            ApiDictionary::USER_CUSTOMFIELD => 'getCustomFields',
            ApiDictionary::USER_SETTINGS => 'getSettings',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::USER_USER => 'getUser',
            ApiDictionary::USER_USERGROUP => 'getGroup',
            ApiDictionary::USER_CUSTOMFIELD => 'getCustomField',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    protected function getApi(): UserApi
    {
        return $this->getSupportPal()->getUserApi();
    }
}
