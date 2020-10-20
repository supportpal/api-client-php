<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Collection;

use Closure;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;

use function array_filter;
use function array_map;
use function array_merge;
use function count;
use function current;
use function get_class;
use function is_object;

/**
 * Wrap collection of Model values
 * Class Collection
 * @package SupportPal\ApiClient\Model\Collection
 */
class Collection
{
    /**
     * Total number of elements returned from API
     * @var int
     */
    private $count;

    /** @var Model[] */
    private $models;

    /**
     * Total number of models in the collection
     * @var int
     */
    private $modelsCount;

    /**
     * Response constructor.
     * @param int $count
     * @param Model[] $models
     * @throws InvalidArgumentException
     */
    public function __construct(int $count = 0, array $models = [])
    {
        $this->assertSameTypeModelInstances($models);
        $this->count = $count;
        $this->models = $models;
        $this->modelsCount = count($models);
    }

    /**
     * get total number of all models as returned from the API response in `count` field.
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
     * Actual number of elements in the collection
     * @return int
     */
    public function getModelsCount(): int
    {
        return $this->modelsCount;
    }

    /**
     * @param Closure $closure
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function map(Closure $closure): Collection
    {
        $value = array_map($closure, $this->getModels());

        return new self($this->getCount(), $value);
    }

    /**
     * @param Closure $closure
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function filter(Closure $closure): Collection
    {
        $value = array_filter($this->getModels(), $closure);

        return new self($this->getCount(), $value);
    }

    /**
     * @return Model|null
     */
    public function first(): ?Model
    {
        return $this->models[0] ?? null;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->getModelsCount() === 0;
    }

    /**
     * Api return count is set to be the one from the merged endpoint
     * @param Collection $collection
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function merge(Collection $collection): Collection
    {
        return new self($this->getCount(), array_merge($this->getModels(), $collection->getModels()));
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
