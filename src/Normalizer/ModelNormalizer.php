<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Normalizer;

use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Transformer\AttributeAwareTransformer;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ModelNormalizer implements ContextAwareNormalizerInterface, ContextAwareDenormalizerInterface
{
    use StringHelper;

    /** @var ObjectNormalizer */
    private $objectNormalizer;

    /** @var iterable|Transformer[] */
    private $transformers;

    /** @var iterable|AttributeAwareTransformer[] */
    private $attributeAwareTransformers;

    /**
     * ModelNormalizer constructor.
     * @param ObjectNormalizer $objectNormalizer
     * @param Transformer[] $transformers
     * @param AttributeAwareTransformer[] $attributeAwareTransformers
     */
    public function __construct(
        ObjectNormalizer $objectNormalizer,
        iterable $transformers,
        iterable $attributeAwareTransformers
    ) {
        $this->objectNormalizer = $objectNormalizer;
        $this->transformers = $transformers;
        $this->attributeAwareTransformers = $attributeAwareTransformers;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, ?string $format = null, array $context = [])
    {
        $data = $this->objectNormalizer->normalize($object, $format, $context);
        $data = $this->applyArrayTransformations($data);

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = [])
    {
        $data = $this->applyAttributeAwareTransformations($data, $type);
        /** @var Model $model */
        $model = $this->objectNormalizer->denormalize($data, $type, $format, $context);
        $model = $this->applyModelTransformations($model);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Model || $this->objectNormalizer->supportsNormalization($data, $format);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->objectNormalizer->supportsDenormalization($data, $type, $format);
    }

    /**
     * @param Model $model
     * @return Model
     */
    protected function applyModelTransformations(Model $model)
    {
        foreach ($this->transformers as $transformer) {
            if (! $transformer->canTransform($model)) {
                continue;
            }

            $model = $transformer->transform($model);
        }

        return $model;
    }

    /**
     * @param array<mixed> $data
     * @param string $type
     * @return array<mixed>
     */
    protected function applyAttributeAwareTransformations(array $data, string $type): array
    {
        foreach ($data as $key => $value) {
            foreach ($this->attributeAwareTransformers as $transformer) {
                if (! $transformer->canTransform($this->snakeCaseToCamelCase($key), $type, $value)) {
                    continue;
                }

                $data[$key] = $transformer->transform($value);
            }
        }

        return $data;
    }

    /**
     * @param array<mixed> $data
     * @return array<mixed>
     */
    protected function applyArrayTransformations(array $data): array
    {
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
}
