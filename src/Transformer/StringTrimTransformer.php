<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

use function is_string;
use function trim;

class StringTrimTransformer implements Transformer
{
    /**
     * @inheritDoc
     */
    public function canTransform($value): bool
    {
        return is_string($value);
    }

    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        return trim($value);
    }
}
