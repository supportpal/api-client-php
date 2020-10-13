<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Normalizer;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Transformer\FieldTransformer;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ModelNormalizer implements ContextAwareNormalizerInterface
{
    /**
     * @var ObjectNormalizer
     */
    private $objectNormalizer;

    /**
     * @var iterable|FieldTransformer[]
     */
    private $transformers;

    /**
     * ModelNormalizer constructor.
     * @param ObjectNormalizer $objectNormalizer
     * @param FieldTransformer[] $transformers
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
                if ($transformer->canTransform($value)) {
                    $data[$key] = $transformer->transform($value);
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Model || $this->objectNormalizer->supportsNormalization($data, $format);
    }
}
