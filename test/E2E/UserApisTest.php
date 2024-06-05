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
            ApiDictionary::USER_OPERATOR => 'getOperators',
            ApiDictionary::USER_OPERATORGROUP => 'getOperatorGroups',
            ApiDictionary::USER_ORGANISATION => 'getOrganisations',
            ApiDictionary::USER_ORGANISATION_CUSTOMFIELD => 'getOrganisationCustomFields',
            ApiDictionary::USER_USER => 'getUsers',
            ApiDictionary::USER_CUSTOMFIELD => 'getUserCustomFields',
            ApiDictionary::USER_USERGROUP => 'getUserGroups',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::USER_OPERATOR => 'getOperator',
            ApiDictionary::USER_OPERATORGROUP => 'getOperatorGroup',
            ApiDictionary::USER_ORGANISATION => 'getOrganisation',
            ApiDictionary::USER_ORGANISATION_CUSTOMFIELD => 'getOrganisationCustomField',
            ApiDictionary::USER_USER => 'getUser',
            ApiDictionary::USER_CUSTOMFIELD => 'getUserCustomField',
            ApiDictionary::USER_USERGROUP => 'getUserGroup',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    public function testUserSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::USER_SETTINGS, 'getSettings');
    }

    protected function getApi(): UserApi
    {
        return $this->getSupportPal()->getUserApi();
    }
}
