<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Transformer\AttributeAwareTransformer;
use SupportPal\ApiClient\Transformer\IntToBooleanTransformer;
use SupportPal\ApiClient\Transformer\StringTrimTransformer;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Annotation\SerializedName;
use TypeError;

use function array_push;
use function count;
use function get_class;
use function implode;
use function is_string;
use function method_exists;

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

        $attributeAwareTransformers = [new IntToBooleanTransformer(new PhpDocExtractor),];
        $transformers = [new StringTrimTransformer,];

        $this->assertRequiredFieldsExists($data);
        foreach ($data as $key => $value) {
            $attributeSetter = 'set' . $this->snakeCaseToPascalCase($key);
            if (! method_exists($this, $attributeSetter)) {
                continue;
            }

            $value = $this->applyAttributeAwareTransformers($attributeAwareTransformers, $key, $value);
            $value = $this->applyValueTransformers($transformers, $value);
            $this->setAttributeValue($attributeSetter, $value);
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

    /**
     * @param AttributeAwareTransformer[] $attributeAwareTransformers
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    private function applyAttributeAwareTransformers(array $attributeAwareTransformers, string $key, $value)
    {
        foreach ($attributeAwareTransformers as $transformer) {
            if (! $transformer->canTransform($this->snakeCaseToCamelCase($key), get_class($this), $value)) {
                continue;
            }

            $value = $transformer->transform($value);
        }

        return $value;
    }

    /**
     * @param string $attributeSetter
     * @param mixed $value
     * @throws InvalidArgumentException
     */
    private function setAttributeValue(string $attributeSetter, $value): void
    {
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

    /**
     * @param Transformer[] $transformers
     * @param mixed $value
     * @return mixed
     */
    private function applyValueTransformers(array $transformers, $value)
    {
        foreach ($transformers as $transformer) {
            if (! $transformer->canTransform($value)) {
                continue;
            }

            $value = $transformer->transform($value);
        }

        return $value;
    }
}
