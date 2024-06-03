<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use function array_merge;

class UpdateUser extends CreateUser
{
    /**
     * @param mixed[] $attributes
     */
    public function __construct(array $attributes = [])
    {
        unset($this->casts['brand_id']);
        unset($this->casts['send_email']);

        $this->casts = array_merge($this->casts, ['overwrite_customfield_values' => 'bool']);

        parent::__construct($attributes);
    }
}
