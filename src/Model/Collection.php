<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @mixin IlluminateCollection<int, Model>
 */
class Collection
{
    /** @var IlluminateCollection<int, Model> */
    private IlluminateCollection $collection;

    /**
     * @param Model[] $models
     */
    public function __construct(protected readonly int $totalCount = 0, array $models = [])
    {
        $this->collection = new IlluminateCollection($models);
    }

    /**
     * Total count returned from API (but not necessarily what is included in the collection).
     */
    public function totalCount(): int
    {
        return $this->totalCount;
    }

    public function __call(string $name, mixed $arguments): mixed
    {
        $result = $this->collection->$name(...$arguments);

        if ($result instanceof IlluminateCollection) {
            return new self($this->totalCount, $result->all());
        }

        return $result;
    }
}
