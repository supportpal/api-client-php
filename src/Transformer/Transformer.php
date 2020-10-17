<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

interface Transformer
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function canTransform($value): bool;

    /**
     * @param mixed $value
     * @return mixed
     */
    public function transform($value);
}
