<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Collection;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Model;

/**
 * This class handles the creation of Collection datatype instance
 * Class CollectionFactory
 * @package SupportPal\ApiClient\Factory\Collection
 */
class CollectionFactory
{
    /**
     * @param int $count
     * @param Model[] $models
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function create(int $count, array $models): Collection
    {
        return new Collection($count, $models);
    }
}
