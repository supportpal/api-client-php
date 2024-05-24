<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\Model;

/**
 * An abstract model factory that is the main base for all model factories
 * Class AbstractModelFactory
 * @package SupportPal\ApiClient\Factory
 */
abstract class ModelFactory
{
    /**
     * @param mixed[] $data
     */
    public function create(array $data): Model
    {
        /** @var Model $model */
        $model = new ($this->getModel());

        return $model->fill($data);
    }

    abstract public function getModel(): string;
}
