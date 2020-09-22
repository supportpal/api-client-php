<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\User;

/**
 * Class UserFactory
 * @package SupportPal\ApiClient\Factory
 */
class UserFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return User::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return User::class;
    }
}
