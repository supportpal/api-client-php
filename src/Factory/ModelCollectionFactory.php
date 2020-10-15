<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\NotSupportedException;
use SupportPal\ApiClient\Model\Model;

/**
 * This class handles the creation of all models
 * Class ModelCollectionFactory
 * @package SupportPal\ApiClient\Factory
 */
class ModelCollectionFactory
{
    /** @var ModelFactory[] */
    private $factories;

    /**
     * ModelCollectionFactory constructor.
     * @param ModelFactory[] $factories
     */
    public function __construct(iterable $factories)
    {
        foreach ($factories as $factory) {
            if (! $factory instanceof ModelFactory) {
                throw new InvalidArgumentException;
            }

            $this->factories[$factory->getModel()] = $factory;
        }
    }

    /**
     * This method creates a Model instance
     * @param string $key
     * @param array<mixed> $data
     * @return Model
     */
    public function create(string $key, array $data): Model
    {
        if (! isset($this->factories[$key])) {
            throw new NotSupportedException;
        }

        return $this->factories[$key]->create($data);
    }
}
