<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Helper;

use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;

/**
 * This includes functions that support validating fields or their values
 * Trait FieldsValidationHelper
 * @package SupportPal\ApiClient\Helper
 */
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
                'incomplete required fields, the following are missing: ' .  implode(',', $missingFields)
            );
        }
    }

    /**
     * This method fetches the list of all required fields in a model
     * @return string[]
     */
    abstract protected function getRequiredFields(): array;
}
