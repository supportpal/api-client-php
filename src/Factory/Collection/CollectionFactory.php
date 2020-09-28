<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Collection;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Model;

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
        $this->assertSameTypeModelInstances($models);

        return new Collection($count, $models);
    }

    /**
     * @param Model[] $models
     * @throws InvalidArgumentException
     */
    private function assertSameTypeModelInstances(array $models): void
    {
        $firstModelType = ! empty($models) && is_object(current($models)) ? get_class(current($models)) : null;
        foreach ($models as $model) {
            if (! $model instanceof Model || get_class($model) !== $firstModelType) {
                throw new InvalidArgumentException;
            }
        }
    }
}
