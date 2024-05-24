<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use function array_merge;

abstract class BaseTranslation extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        $this->casts = array_merge($this->casts, ['locale' => 'string']);

        parent::__construct($attributes);
    }
}
