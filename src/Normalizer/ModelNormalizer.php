<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Normalizer;

use ArrayObject;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Transformer\AttributeAwareTransformer;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ModelNormalizer implements NormalizerInterface, DenormalizerInterface
{
    use StringHelper;

    /** @var NormalizerInterface */
    private $normalizer;

    /** @var iterable|Transformer[] */
    private $transformers;

    /** @var iterable|AttributeAwareTransformer[] */
    private $attributeAwareTransformers;

    /**
     * ModelNormalizer constructor.
     * @param NormalizerInterface $normalizer
     * @param Transformer[] $transformers
     * @param AttributeAwareTransformer[] $attributeAwareTransformers
     */
    public function __construct(
        NormalizerInterface&DenormalizerInterface $normalizer,
        iterable $transformers,
        iterable $attributeAwareTransformers
    ) {
        $this->normalizer = $normalizer;
        $this->transformers = $transformers;
        $this->attributeAwareTransformers = $attributeAwareTransformers;
    }

    /**
     * @inheritDoc
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): float|array|ArrayObject|bool|int|string|null
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        return $this->applyArrayTransformations($data);
    }

    /**
     * @inheritDoc
     */
    public function denormalize(mixed $data, string|int|bool|array|float $type, ?string $format = null, array $context = []): mixed
    {
        $data = $this->applyAttributeAwareTransformations($data, $type);
        /** @var Model $model */
        $model = $this->normalizer->denormalize($data, $type, $format, $context);

        return $this->applyModelTransformations($model);
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Model || $this->normalizer->supportsNormalization($data, $format);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->normalizer->supportsDenormalization($data, $type, $format);
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

    /**
     * @inheritDoc
     */
    public function getSupportedTypes(?string $format): array
    {
        return $this->normalizer->getSupportedTypes($format);
    }
}
