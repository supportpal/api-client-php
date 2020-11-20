<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class UserData extends BaseModelData
{
    public const DATA = BaseUserData::DATA + [
        'organisation' => OrganisationData::DATA,
        'customfields' => [UserCustomFieldData::DATA,],
        'groups' => [GroupData::DATA,]
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['organisation'] = (new OrganisationData)->getFilledInstance();
        $data['customfields'] = [(new UserCustomFieldData)->getFilledInstance(),];
        $data['groups'] = [(new GroupData)->getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return User::class;
    }
}
