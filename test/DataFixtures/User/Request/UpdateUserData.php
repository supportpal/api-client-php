<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User\Request;

use SupportPal\ApiClient\Model\User\Request\UpdateUser;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class UpdateUserData extends BaseModelData
{
    public const DATA = [
        'firstname' => 'test',
        'lastname' => 'test',
        'email' => 'test',
        'password' => 'test',
        'country' => 'test',
        'language_code' => 'test',
        'timezone' => 'test',
        'email_verified' => 1,
        'active' => 1,
        'organisation' => '1',
        'organisation_id' => 1,
        'organisation_access_level' => 1,
        'organisation_notifications' => 1,
        'customfield' => [1 => 'test'],
        'groups' => [1],
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UpdateUser::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => UserData::DATA,
        ];
    }
}
