<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

use function intval;
use function is_bool;

class BooleanToIntTransformer implements Transformer
{
    /**
     * @inheritDoc
     */
    public function canTransform($value): bool
    {
        return is_bool($value);
    }

    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        return intval($value);
    }
}
