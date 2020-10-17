<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use Symfony\Component\Serializer\Annotation\SerializedName;
use TypeError;

use function array_push;
use function count;
use function implode;
use function is_string;
use function method_exists;
use function trim;

/**
 * Class BaseModel
 * @package SupportPal\ApiClient\Model
 */
abstract class BaseModel implements Model
{
    public const REQUIRED_FIELDS = [];

    use StringHelper;

    /**
     * @var array<mixed>|null
     * @SerializedName("pivot")
     */
    private $pivot;

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
            if (! method_exists($this, $attributeSetter)) {
                continue;
            }

            $value = is_string($value) ? trim($value) : $value;
            try {
                $this->{$attributeSetter}($value);
            } catch (TypeError $exception) {
                throw new InvalidArgumentException(
                    $exception->getMessage(),
                    $exception->getCode(),
                    $exception->getPrevious()
                );
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

    /**
     * This functions asserts that all the required values for the API are passed correctly
     * @param array<mixed> $data
     * @return void
     */
    protected function assertRequiredFieldsExists(array $data): void
    {
        $missingFields = [];
        foreach ($this->getRequiredFields() as $required) {
            if (isset($data[$required])) {
                continue;
            }

            array_push($missingFields, $required);
        }

        if (count($missingFields) > 0) {
            throw new MissingRequiredFieldsException(
                'incomplete required fields, the following are missing: ' .  implode(',', $missingFields)
            );
        }
    }

    /**
     * @return array<mixed>|null
     */
    public function getPivot(): ?array
    {
        return $this->pivot;
    }

    /**
     * @param array<mixed>|null $pivot
     * @return BaseModel
     */
    public function setPivot(?array $pivot): self
    {
        $this->pivot = $pivot;

        return $this;
    }
}
