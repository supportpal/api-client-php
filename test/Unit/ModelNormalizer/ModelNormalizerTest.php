<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ModelNormalizer;

use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Normalizer\ModelNormalizer;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\AttributeAwareTransformer;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * Class ModelNormalizerTest
 * @package SupportPal\ApiClient\Tests\Unit\ModelNormalizer
 * @covers \SupportPal\ApiClient\Normalizer\ModelNormalizer
 */
class ModelNormalizerTest extends TestCase
{
    use StringHelper;

    /** @var ObjectProphecy|Transformer */
    private $transformer;

    /** @var ObjectProphecy|AbstractNormalizer */
    private $normalizer;

    /** @var ModelNormalizer */
    private $modelNormalizer;

    /** @var object|ProphecySubjectInterface */
    private $object;

    /** @var string */
    private $format;

    /** @var array<mixed> */
    private $context;

    /** @var string[] */
    private $inputData;

    /** @var string[] */
    private $transformedOutput;

    /** @var ObjectProphecy|AttributeAwareTransformer */
    private $attributeAwareTransformer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->normalizer = $this->prophesize(AbstractNormalizer::class);
        $this->transformer = $this->prophesize(Transformer::class);
        $this->attributeAwareTransformer = $this->prophesize(AttributeAwareTransformer::class);

        $this->object = $this->prophesize(Model::class)->reveal();
        $this->format = 'json';
        $this->context = [];
        $this->inputData = ['test' => '1', 'test2' => '2', 'test3' => '3',];
        $this->transformedOutput = ['test' => '5', 'test2' => '6', 'test3' => '7',];

        /** @var AbstractObjectNormalizer $objectNormalizer */
        $objectNormalizer = $this->normalizer->reveal();
        /** @var Transformer $transformer */
        $transformer = $this->transformer->reveal();
        /** @var AttributeAwareTransformer $transformer */
        $attributeAwareTransformer = $this->attributeAwareTransformer->reveal();

        /** @var Transformer[] $transformers */
        $transformers = [$transformer];
        /** @var AttributeAwareTransformer[] $attributeAwareTransformers */
        $attributeAwareTransformers = [$attributeAwareTransformer];
        $this->modelNormalizer = new ModelNormalizer($objectNormalizer, $transformers, $attributeAwareTransformers);
    }

    public function testNormalizeTransformAll(): void
    {
        $this->normalizer
            ->normalize($this->object, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->inputData);
        foreach ($this->inputData as $key => $value) {
            $this->transformer->canTransform($value)->shouldBeCalled()->willReturn(true);
            $this->transformer->transform($value)->shouldBeCalled()->willReturn($this->transformedOutput[$key]);
        }

        $data = $this->modelNormalizer->normalize($this->object, $this->format, $this->context);
        self::assertSame($this->transformedOutput, $data);
    }

    /**
     * @dataProvider provideSupportNormalizationCases
     * @param mixed $data
     * @param bool $objectNormalizerSupports
     * @param bool $expectation
     */
    public function testSupportsNormalization(mixed $data, bool $objectNormalizerSupports, bool $expectation): void
    {
        $objectNormalizerExpectation = $this->normalizer
            ->supportsNormalization($data, $this->format)
            ->willReturn($objectNormalizerSupports);

        if ($data instanceof Model) {
            $objectNormalizerExpectation->shouldNotBeCalled();
        }

        if (! $data instanceof Model) {
            $objectNormalizerExpectation->shouldBeCalled();
        }

        $this->normalizer
            ->supportsNormalization($data, $this->format)
            ->willReturn($objectNormalizerSupports);

        self::assertSame($expectation, $this->modelNormalizer->supportsNormalization($data, $this->format, []));
    }

    /**
     * @return iterable<int, array<mixed>>
     * @throws InvalidArgumentException
     */
    public function provideSupportNormalizationCases(): iterable
    {
        yield [[], true, true];
        yield [new Comment, false, true];
        yield [[], false, false];
    }

    public function testNormalizeTransformNone(): void
    {
        $this->normalizer
            ->normalize($this->object, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->inputData);

        foreach ($this->inputData as $value) {
            $this->transformer->canTransform($value)->shouldBeCalled()->willReturn(false);
            $this->transformer->transform($value)->shouldNotBeCalled();
        }

        $data = $this->modelNormalizer->normalize($this->object, $this->format, $this->context);
        self::assertSame($this->inputData, $data);
    }

    /**
     * @param mixed $data
     * @param bool $objectNormalizerSupports
     * @dataProvider provideSupportNormalizationCases
     */
    public function testSupportsDenormalization(mixed $data, bool $objectNormalizerSupports): void
    {
        $this->normalizer
            ->supportsDenormalization($data, Model::class, $this->format)
            ->willReturn($objectNormalizerSupports)
            ->shouldBeCalled();

        self::assertSame(
            $objectNormalizerSupports,
            $this->modelNormalizer->supportsDenormalization($data, Model::class, $this->format)
        );
    }

    /**
     * @return iterable<mixed>
     */
    public function provideSupportDenormalizationCases(): iterable
    {
        yield [[], true];
        yield [new Comment, false];
        yield [[], false];
    }

    public function testDenormalize(): void
    {
        $this
            ->normalizer
            ->denormalize($this->inputData, Model::class, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->object);

        foreach ($this->inputData as $key => $value) {
            $this
                ->attributeAwareTransformer
                ->canTransform($this->snakeCaseToCamelCase($key), Model::class, $value)
                ->shouldBeCalled()
                ->willReturn(false);
        }

        $this->attributeAwareTransformer->transform(Argument::any())->shouldNotBeCalled();
        $this->transformer->canTransform($this->object)->shouldBeCalled()->willReturn(true);
        $this->transformer->transform($this->object)->shouldBeCalled()->willReturn(null);
        $output = $this->modelNormalizer->denormalize($this->inputData, Model::class, $this->format, $this->context);
        self::assertNull($output);
    }
}
