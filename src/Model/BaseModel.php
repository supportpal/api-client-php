<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\FieldsValidationHelper;
use SupportPal\ApiClient\Helper\StringHelper;

/**
 * Class BaseModel
 * @package SupportPal\ApiClient\Model
 */
abstract class BaseModel implements Model
{
    public const REQUIRED_FIELDS = [];

    use FieldsValidationHelper;
    use StringHelper;

    /**
     * @inheritDoc
     */
    public function fill(array $data): Model
    {
        foreach ($data as $key => $value) {
            if (! is_string($key)) {
                throw new InvalidArgumentException(
                    'Supplied input must be an associative array of template: array<string, mixed>'
                );
            }
        }

        $this->assertRequiredFieldsExists($data);
        foreach ($data as $key => $value) {
            $attributeSetter = 'set' . $this->snakeCaseToPascalCase($key);
            if (method_exists($this, $attributeSetter)) {
                try {
                    $this->{$attributeSetter}($value);
                } catch (\TypeError $exception) {
                    throw new InvalidArgumentException(
                        $exception->getMessage(),
                        $exception->getCode(),
                        $exception->getPrevious()
                    );
                }
            }
        }

        return $this;
    }

    /**
     * @return string[]
     */
    protected function getRequiredFields(): array
    {
        return static::REQUIRED_FIELDS;
    }
}
