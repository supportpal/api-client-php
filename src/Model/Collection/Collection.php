<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Collection;

use SupportPal\ApiClient\Model\Model;

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
     */
    public function __construct(int $count, array $models)
    {
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
}
