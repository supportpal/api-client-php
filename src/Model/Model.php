<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;

interface Model
{
    /**
     * @param array<string, mixed> $data
     * @throws InvalidArgumentException
     */
    public function fill(array $data): Model;
}
