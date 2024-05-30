<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Shared\CustomField;

use function array_merge;

class UserCustomField extends CustomField
{
    /**
     * @param mixed[] $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->casts = array_merge($this->casts, [
            'user_id'      => 'int',
            'translations' => 'array:' . UserCustomFieldTranslation::class
        ]);

        parent::__construct($attributes);
    }
}
