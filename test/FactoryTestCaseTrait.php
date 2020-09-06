<?php


namespace SupportPal\ApiClient\Tests;

use SupportPal\ApiClient\Factory\ModelFactory;

trait FactoryTestCaseTrait
{
    /**
     * @return iterable<mixed>
     */
    public function provideDataWithMissingFields(): iterable
    {
        foreach ($this->getRequiredFields() as $requiredField) {
            $commentDataCopy = $this->getModelData();
            unset($commentDataCopy[$requiredField]);
            yield [$commentDataCopy, $requiredField];
        }
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getRequiredFields(): array;

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
