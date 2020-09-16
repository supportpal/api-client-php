<?php


namespace SupportPal\ApiClient\Helper;

use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;

trait FieldsValidationHelper
{
    /**
     * This functions asserts that all the required values for the API are passed correctly
     * @param array<mixed> $data
     * @return void
     */
    protected function assertRequiredFieldsExists(array $data): void
    {
        $missingFields = [];
        foreach ($this->getRequiredFields() as $required) {
            if (! isset($data[$required])) {
                array_push($missingFields, $required);
            }
        }
        if (count($missingFields) > 0) {
            throw new MissingRequiredFieldsException(
                'incomplete required fields, the following are missing: ' .  join(',', $missingFields)
            );
        }
    }

    /**
     * @return string[]
     */
    abstract protected function getRequiredFields(): array;
}
