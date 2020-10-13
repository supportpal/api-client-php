<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Transformer;

interface FieldTransformer
{
    /**
     * @param $value
     * @return bool
     */
    public function canTransform($value): bool;

    /**
     * @param $value
     * @return mixed
     */
    public function transform($value);
}
