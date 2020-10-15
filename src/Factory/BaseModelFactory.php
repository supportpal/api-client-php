<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory;

use Exception;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * An abstract model factory that is the main base for all model factories
 * Class AbstractModelFactory
 * @package SupportPal\ApiClient\Factory
 */
abstract class BaseModelFactory implements ModelFactory
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var string */
    private $formatType;

    /** @var EncoderInterface */
    private $encoder;

    /**
     * AbstractModelFactory constructor.
     * @param SerializerInterface $serializer
     * @param string $formatType
     * @param EncoderInterface $encoder
     */
    public function __construct(string $formatType, SerializerInterface $serializer, EncoderInterface $encoder)
    {
        $this->serializer = $serializer;
        $this->formatType = $formatType;
        $this->encoder = $encoder;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        try {
            /** @var Model $model */
            $model = $this->serializer->deserialize(
                $this->encoder->encode($data, $this->formatType),
                $this->getModel(),
                $this->formatType
            );
        } catch (Exception $invalidArgumentException) {
            throw new InvalidArgumentException(
                $invalidArgumentException->getMessage(),
                $invalidArgumentException->getCode(),
                $invalidArgumentException->getPrevious()
            );
        }

        return $model;
    }
}
