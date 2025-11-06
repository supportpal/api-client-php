<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use function array_merge;

/**
 * @property string $locale
 */
abstract class Translation extends Model
{
    /**
     * @param mixed[] $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->casts = array_merge($this->casts, ['locale' => 'string']);

        parent::__construct($attributes);
    }
}
