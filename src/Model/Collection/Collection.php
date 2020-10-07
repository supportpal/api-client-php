<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Collection;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;

/**
 * Wrap collection of Model values
 * Class Collection
 * @package SupportPal\ApiClient\Model\Collection
 */
class Collection
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var Model[]
     */
    private $models;

    /**
     * Response constructor.
     * @param int $count
     * @param Model[] $models
     * @throws InvalidArgumentException
     */
    public function __construct(int $count, array $models)
    {
        $this->assertSameTypeModelInstances($models);
        $this->count = $count;
        $this->models = $models;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return Model[]
     */
    public function getModels(): array
    {
        return $this->models;
    }

    /**
     * @param \Closure $closure
     * @return Collection
     */
    public function map(\Closure $closure): Collection
    {
        $value = array_map($closure, $this->getModels());

        return new self($this->getCount(), $value);
    }

    /**
     * @param \Closure $closure
     * @return Collection
     */
    public function filter(\Closure $closure): Collection
    {
        $value = array_filter($this->getModels(), $closure);

        return new self(count($value), $value);
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
                throw new InvalidArgumentException(
                    'Supplied models must implement' . Model::class . ' and belong to the same type'
                );
            }
        }
    }
}
