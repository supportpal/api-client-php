<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\User\Organisation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class OrganisationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'brand_id' => 1,
        'owner_id' => null,
        'name' => 'new org',
        'country' => null,
        'language_code' => null,
        'timezone' => null,
        'notes' => null,
        'created_at' => 1598353061,
        'updated_at' => 1598353061,
        'domains' => [DomainData::DATA,],
        'customfields' => [UserCustomFieldData::DATA,],
        'users' => [],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['domains'] = [DomainData::getFilledInstance(),];
        $data['customfields'] = [UserCustomFieldData::getFilledInstance(),];
        $data['users'] = [];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Organisation::class;
    }
}
