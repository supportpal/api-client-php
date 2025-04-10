<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\OrganisationCustomFieldTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class OrganisationCustomFieldTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'user_organisation_custom_field_id' => 1,
        'name' => 'test',
        'description' => '',
        'purified_description' => '',
        'regex_error_message' => null,
        'locale' => 'ar',
    ];

    public function getModel(): string
    {
        return OrganisationCustomFieldTranslation::class;
    }
}
