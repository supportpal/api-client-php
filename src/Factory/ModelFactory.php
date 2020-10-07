<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;

/**
 * Interface ModelFactory
 * @package SupportPal\ApiClient\Factory
 */
interface ModelFactory
{
    /**
     * This method creates an instance of a SupportPalModel
     * @param array<mixed> $data
     * @throws InvalidArgumentException
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * This function returns the model name related to the relevant factory
     * @return string
     */
    public function getModel(): string;
}
