<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Normalizer;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ModelNormalizer implements ContextAwareNormalizerInterface, ContextAwareDenormalizerInterface
{
    /** @var ObjectNormalizer */
    private $objectNormalizer;

    /** @var iterable|Transformer[] */
    private $transformers;

    /**
     * ModelNormalizer constructor.
     * @param ObjectNormalizer $objectNormalizer
     * @param Transformer[] $transformers
     */
    public function __construct(ObjectNormalizer $objectNormalizer, iterable $transformers)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->transformers = $transformers;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        $data = $this->objectNormalizer->normalize($object, $format, $context);
        foreach ($data as $key => $value) {
            foreach ($this->transformers as $transformer) {
                if (! $transformer->canTransform($value)) {
                    continue;
                }

                $data[$key] = $transformer->transform($value);
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        $model = $this->objectNormalizer->denormalize($data, $type, $format, $context);

        foreach ($this->transformers as $transformer) {
            if (! $transformer->canTransform($model)) {
                continue;
            }

            $model = $transformer->transform($model);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Model || $this->objectNormalizer->supportsNormalization($data, $format);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {
        return $this->objectNormalizer->supportsDenormalization($data, $type, $format);
    }
}
