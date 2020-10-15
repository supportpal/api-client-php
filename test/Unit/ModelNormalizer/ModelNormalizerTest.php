<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ModelNormalizer;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Normalizer\ModelNormalizer;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ModelNormalizerTest extends TestCase
{
    /** @var ObjectProphecy */
    private $transformer;

    /** @var ObjectProphecy */
    private $objectNormalizer;

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

    protected function setUp(): void
    {
        parent::setUp();
        $this->objectNormalizer = $this->prophesize(ObjectNormalizer::class);
        $this->transformer = $this->prophesize(Transformer::class);

        $this->object = $this->prophesize(Model::class)->reveal();
        $this->format = 'json';
        $this->context = [];
        $this->inputData = ['test' => '1', 'test2' => '2', 'test3' => '3',];
        $this->transformedOutput = ['test' => '5', 'test2' => '6', 'test3' => '7',];

        /** @var ObjectNormalizer $objectNormalizer */
        $objectNormalizer = $this->objectNormalizer->reveal();
        /** @var Transformer $transformer */
        $transformer = $this->transformer->reveal();

        $this->modelNormalizer = new ModelNormalizer($objectNormalizer, [$transformer]);
    }

    public function testNormalizeTransformAll(): void
    {
        $this->objectNormalizer
            ->normalize($this->object, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->inputData);
        foreach ($this->inputData as $key => $value) {
            $this->transformer->canTransform($value)->shouldBeCalled()->willReturn(true);
            $this->transformer->transform($value)->shouldBeCalled()->willReturn($this->transformedOutput[$key]);
        }

        $data = $this->modelNormalizer->normalize($this->object, $this->format, $this->context);
        $this->assertSame($this->transformedOutput, $data);
    }

    /**
     * @dataProvider provideSupportNormalizationCases
     * @param mixed $data
     * @param bool $objectNormalizerSupports
     * @param bool $expectation
     */
    public function testSupportsNormalization($data, bool $objectNormalizerSupports, bool $expectation): void
    {
        $objectNormalizerExpectation = $this->objectNormalizer
            ->supportsNormalization($data, $this->format)
            ->willReturn($objectNormalizerSupports);

        if ($data instanceof Model) {
            $objectNormalizerExpectation->shouldNotBeCalled();
        } else {
            $objectNormalizerExpectation->shouldBeCalled();
        }

        $this->objectNormalizer
            ->supportsNormalization($data, $this->format)
            ->willReturn($objectNormalizerSupports);

        $this->assertSame($expectation, $this->modelNormalizer->supportsNormalization($data, $this->format, []));
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
        $this->objectNormalizer
            ->normalize($this->object, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->inputData);
        foreach ($this->inputData as $key => $value) {
            $this->transformer->canTransform($value)->shouldBeCalled()->willReturn(false);
            $this->transformer->transform($value)->shouldNotBeCalled();
        }

        $data = $this->modelNormalizer->normalize($this->object, $this->format, $this->context);
        $this->assertSame($this->inputData, $data);
    }

    /**
     * @param mixed $data
     * @param bool $objectNormalizerSupports
     * @dataProvider provideSupportNormalizationCases
     */
    public function testSupportsDenormalization($data, bool $objectNormalizerSupports): void
    {
        $this->objectNormalizer
            ->supportsDenormalization($data, Model::class, $this->format)
            ->willReturn($objectNormalizerSupports)
            ->shouldBeCalled();

        $this->assertSame(
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
            ->objectNormalizer
            ->denormalize($this->inputData, Model::class, $this->format, $this->context)
            ->shouldBeCalled()
            ->willReturn($this->object);

        $this->transformer->canTransform($this->object)->shouldBeCalled()->willReturn(true);
        $this->transformer->transform($this->object)->shouldBeCalled()->willReturn(null);
        $output = $this->modelNormalizer->denormalize($this->inputData, Model::class, $this->format, $this->context);
        $this->assertNull($output);
    }
}