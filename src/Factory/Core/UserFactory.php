<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Core;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Core\User;

/**
 * Class UserFactory
 * @package SupportPal\ApiClient\Factory
 */
class UserFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return User::class;
    }
}
