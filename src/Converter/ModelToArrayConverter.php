<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Converter;

use SupportPal\ApiClient\Model\Model;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * This class handles the conversion of SupportPal Models to a <key, value> array
 * Class ModelToArrayConverter
 * @package SupportPal\ApiClient\Converter
 */
class ModelToArrayConverter
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var DecoderInterface */
    private $decoder;

    /** @var string */
    private $format;

    public function __construct(SerializerInterface $serializer, DecoderInterface $decoder, string $format)
    {
        $this->serializer = $serializer;
        $this->decoder = $decoder;
        $this->format = $format;
    }

    /**
     * @param Model $model
     * @throws UninitializedPropertyException
     * @return array<mixed>
     */
    public function convertOne(Model $model): array
    {
        return $this->decoder->decode($this->serializer->serialize($model, $this->format), $this->format);
    }
}
