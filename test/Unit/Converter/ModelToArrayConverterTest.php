<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Converter;

use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ModelToArrayConverterTest
 * @package SupportPal\ApiClient\Tests\Unit\Converter
 * @covers \SupportPal\ApiClient\Converter\ModelToArrayConverter
 */
class ModelToArrayConverterTest extends TestCase
{
    /** @var ObjectProphecy */
    private $serializer;

    /** @var ObjectProphecy */
    private $decoder;

    /** @var ModelToArrayConverter */
    private $modelToArrayConverter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = $this->prophesize(SerializerInterface::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);

        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        $this->modelToArrayConverter = new ModelToArrayConverter($serializer, $decoder, 'json');
    }

    public function testConvertModel(): void
    {
        $modelProphecy = $this->prophesize(Model::class);
        $expectation = ['test' => 'test'];
        $this->serializer->serialize($modelProphecy->reveal(), 'json')->shouldBeCalled()->willReturn('{test}');
        $this->decoder->decode('{test}', 'json')->willReturn($expectation)->shouldBeCalled();

        /** @var Model $model */
        $model = $modelProphecy->reveal();
        $actual = $this->modelToArrayConverter->convertOne($model);
        self::assertSame($expectation, $actual);
    }
}
