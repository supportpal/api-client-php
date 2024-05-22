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
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return (new ($this->getModel))->fill($data);
    }

    abstract public function getModel(): string;
}
