<?php


namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Exception\InvalidModelException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Model\Model;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @TODO Add Symfony Validator as a part of the flow
 */

/**
 * An abstract model factory that is the main base for all model factories
 * Class AbstractModelFactory
 * @package SupportPal\ApiClient\Factory
 */
abstract class AbstractModelFactory implements ModelFactory
{
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var string
     */
    private $formatType;

    /**
     * AbstractModelFactory constructor.
     * @param SerializerInterface $serializer
     * @param string $formatType
     */
    public function __construct(SerializerInterface $serializer, string $formatType)
    {
        $this->serializer = $serializer;
        $this->formatType = $formatType;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        $this->assertRequiredFieldsExists($data);

        $model = $this->serializer->deserialize(json_encode($data), $this->getModel(), $this->formatType);

        if (! $model instanceof Model) {
            throw new InvalidModelException;
        }

        return $model;
    }

    /**
     * This functions asserts that all the required values for the API are passed correctly
     * @param array<mixed> $data
     * @throws MissingRequiredFieldsException
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
     * This method fetches the list of all required fields in a model
     * @return array<mixed>
     */
    abstract protected function getRequiredFields(): array;
}
