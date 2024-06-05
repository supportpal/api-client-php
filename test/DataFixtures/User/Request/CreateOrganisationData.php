<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User\Request;

use SupportPal\ApiClient\Model\User\Request\CreateOrganisation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationData;

class CreateOrganisationData extends BaseModelData
{
    public const DATA = [
        'brand_id' => 1,
        'name' => 'test',
        'customfield' => [1 => 'test'],
        'country' => 'test',
        'language_code' => 'test',
        'timezone' => 'test',
        'notes' => 'test',
        'domains' => ['google.com'],
        'access_level' => [1 => 0],
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateOrganisation::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => OrganisationData::DATA,
        ];
    }
}
