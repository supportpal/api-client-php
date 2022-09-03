<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Transformer;

use Prophecy\Prophecy\ObjectProphecy;
use stdClass;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\IntToBooleanTransformer;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type;

class IntToBooleanTransformerTest extends TestCase
{
    /** @var IntToBooleanTransformer */
    private $intToBooleanTransformer;

    /** @var ObjectProphecy|PropertyTypeExtractorInterface */
    private $propertyTypeExtractor;

    /** @var string */
    private $attribute = 'test';

    /** @var ObjectProphecy|Type */
    private $type;

    protected function setUp(): void
    {
        parent::setUp();
        $this->propertyTypeExtractor = $this->prophesize(PropertyTypeExtractorInterface::class);

        $this->type = $this->prophesize(Type::class);

        /** @var PropertyTypeExtractorInterface $propertyTypeExtractor */
        $propertyTypeExtractor = $this->propertyTypeExtractor->reveal();
        $this->intToBooleanTransformer = new IntToBooleanTransformer($propertyTypeExtractor);
    }

    /**
     * @param mixed $value
     * @dataProvider provideCannotTransformNonIntValueCases
     */
    public function testCannotTransformNonIntValue($value): void
    {
        $this->propertyTypeExtractor->getTypes(Model::class, $this->attribute)->shouldNotBeCalled();
        self::assertFalse($this->intToBooleanTransformer->canTransform($this->attribute, Model::class, $value));
    }

    /**
     * @param int $value
     * @dataProvider provideCannotTransformIntNotBooleanValueCases
     */
    public function testCannotTransformIntNotBooleanValue(int $value): void
    {
        $this->propertyTypeExtractor->getTypes(Model::class, $this->attribute)->shouldNotBeCalled();
        self::assertFalse($this->intToBooleanTransformer->canTransform($this->attribute, Model::class, $value));
    }

    /**
     * @param int $value
     * @dataProvider provideCannotTransformAttributeNotBool
     */
    public function testCannotTransformNonBooleanAttribute(int $value): void
    {
        $this->type->getBuiltinType()->shouldBeCalled()->willReturn('test');
        $this->propertyTypeExtractor
            ->getTypes(Model::class, $this->attribute)
            ->shouldBeCalled()
            ->willReturn([$this->type->reveal()]);

        self::assertFalse($this->intToBooleanTransformer->canTransform($this->attribute, Model::class, $value));
    }

    /**
     * @param int $value
     * @dataProvider provideCanTransformCases
     */
    public function testCanTransform(int $value): void
    {
        $this->type->getBuiltinType()->shouldBeCalled()->willReturn(Type::BUILTIN_TYPE_BOOL);
        $this->propertyTypeExtractor
            ->getTypes(Model::class, $this->attribute)
            ->shouldBeCalled()
            ->willReturn([$this->type->reveal()]);

        self::assertTrue($this->intToBooleanTransformer->canTransform($this->attribute, Model::class, $value));
    }

    /**
     * @param int $data
     * @param bool $expected
     * @dataProvider provideTransformCases
     */
    public function testTransform(int $data, bool $expected): void
    {
        self::assertSame($expected, $this->intToBooleanTransformer->transform($data));
    }

    public function testCannotDetermineAttributeType(): void
    {
        $this->propertyTypeExtractor
            ->getTypes(Model::class, $this->attribute)
            ->shouldBeCalled()
            ->willReturn(null);

        $value = $this->intToBooleanTransformer->canTransform($this->attribute, Model::class, 1);
        self::assertSame(false, $value);
    }

    /**
     * @return iterable<int, array<int, int|bool>>
     */
    public function provideTransformCases(): iterable
    {
        yield [1, true];
        yield [0, false];
    }

    /**
     * @return iterable<array<int, int>>
     */
    public function provideCanTransformCases(): iterable
    {
        yield [0];
        yield [1];
    }

    /**
     * @return iterable<array<int, int>>
     */
    public function provideCannotTransformAttributeNotBool(): iterable
    {
        yield [0];
        yield [1];
    }

    /**
     * @return iterable<int, mixed>
     */
    public function provideCannotTransformNonIntValueCases(): iterable
    {
        yield [new Comment];
        yield [5.0];
        yield ['str'];
        yield [new stdClass];
    }

    /**
     * @return iterable<array<int, int>>
     */
    public function provideCannotTransformIntNotBooleanValueCases(): iterable
    {
        yield [2];
        yield [3];
        yield [-1];
    }
}
