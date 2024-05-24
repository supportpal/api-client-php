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
        $modelClass = $this->getModel();

        return (new $modelClass)->fill($data);
    }

    /**
     * @return class-string<Model>
     */
    abstract public function getModel(): string;
}
