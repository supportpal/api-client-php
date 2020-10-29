<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

interface AttributeAwareTransformer
{
    /**
     * @param string $attribute
     * @param string $type
     * @param mixed $value
     * @return bool
     */
    public function canTransform(string $attribute, string $type, $value): bool;

    /**
     * @param mixed $value
     * @return mixed
     */
    public function transform($value);
}
