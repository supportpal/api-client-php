<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User\Request;

use SupportPal\ApiClient\Model\User\Request\CreateOperator;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\OperatorData;

class CreateOperatorData extends BaseModelData
{
    public const DATA = [
        'firstname' => 'test',
        'lastname' => 'test',
        'email' => 'test12345@test.com',
        'password' => 'test',
        'country' => 'test',
        'language_code' => 'test',
        'timezone' => 'test',
        'confirmed' => 1,
        'active' => 1,
        'groups' => [1],
        'depts' => [1],
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateOperator::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => OperatorData::DATA,
        ];
    }
}
