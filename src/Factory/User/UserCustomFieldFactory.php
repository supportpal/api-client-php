<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\User;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\User\UserCustomField;

class UserCustomFieldFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UserCustomField::class;
    }
}
