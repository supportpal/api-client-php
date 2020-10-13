<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Transformer;

class StringTrimTransformer implements FieldTransformer
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
