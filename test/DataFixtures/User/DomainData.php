<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\Domain;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class DomainData extends BaseModelData
{
    public const DATA = [
        'organisation_id' => 2,
        'domain' => 'mytestdomain.me',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Domain::class;
    }
}
