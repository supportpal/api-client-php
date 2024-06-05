<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

class UpdateOrganisation extends CreateOrganisation
{
    /**
     * @param mixed[] $attributes
     */
    public function __construct(array $attributes = [])
    {
        unset($this->casts['brand_id']);

        parent::__construct($attributes);
    }
}
