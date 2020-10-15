<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use SupportPal\ApiClient\Factory\ModelFactory;

/**
 * Trait FactoryTestCase
 * @package SupportPal\ApiClient\Tests
 */
trait FactoryTestCase
{
    /**
     * @return array<mixed>
     */
    abstract protected function getModelData(): array;

    /**
     * @return class-string<object>
     */
    abstract protected function getModel(): string;

    /**
     * @return ModelFactory
     */
    abstract protected function getModelFactory(): ModelFactory;
}
