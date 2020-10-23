<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\User;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\User\UserCustomField;

class UserCustomFieldFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return UserCustomField::class;
    }
}
