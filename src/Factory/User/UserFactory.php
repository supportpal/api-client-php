<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\User\User;

/**
 * Class UserFactory
 * @package SupportPal\ApiClient\Factory
 */
class UserFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return User::class;
    }
}
