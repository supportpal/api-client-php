<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;

/**
 * Interface Model
 * @package SupportPal\ApiClient\Model
 */
interface Model
{
    /**
     * @param array<string, mixed> $data
     * @return self
     * @throws InvalidArgumentException
     */
    public function fill(array $data): Model;
}
