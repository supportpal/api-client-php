<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\FieldsValidationHelper;
use SupportPal\ApiClient\Helper\StringHelper;

abstract class BaseModel implements Model
{
    public const REQUIRED_FIELDS = [];

    use FieldsValidationHelper;
    use StringHelper;

    /**
     * @param array<string, mixed> $data
     * @return Model
     * @throws InvalidArgumentException
     */
    public function fill(array $data): Model
    {
        $this->assertRequiredFieldsExists($data);
        foreach ($data as $key => $value) {
            if (! is_string($key)) {
                throw new InvalidArgumentException(
                    'Supplied input must be an associative array of template: array<string, mixed>'
                );
            }
            $attributeSetter = 'set' . $this->snakeCaseToPascalCase($key);
            if (method_exists($this, $attributeSetter)) {
                try {
                    $this->{$attributeSetter}($value);
                } catch (\TypeError $exception) {
                    throw new InvalidArgumentException(
                        $exception->getMessage(),
                        0,
                        $exception->getPrevious()
                    );
                }
            }
        }

        return $this;
    }
}
