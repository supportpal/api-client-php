<?php


namespace SupportPal\ApiClient\Transformer;


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
