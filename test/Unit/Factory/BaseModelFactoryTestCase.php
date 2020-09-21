<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\FactoryTestCase;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;

abstract class BaseModelFactoryTestCase extends TestCase
{
    use FactoryTestCase;

    use StringHelper;

    /**
     * @var ObjectProphecy
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $format = 'json';

    /**
     * @var ObjectProphecy
     */
    private $encoder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serializer = $this->prophesize(SerializerInterface::class);
        $this->encoder = $this->prophesize(EncoderInterface::class);
    }

    public function testCreateModel(): void
    {
        $this->encoder->encode($this->getModelData(), $this->format)->willReturn(json_encode($this->getModelData()));
        $this->serializer
            ->deserialize(json_encode($this->getModelData()), $this->getModel(), $this->format)
            ->shouldBeCalled()
            ->willReturn($this->getModelInstance());

        $model = $this->getModelFactory()->create($this->getModelData());
        self::assertInstanceOf($this->getModel(), $model);
    }

    /**
     * @dataProvider provideDataWithMissingFields
     * @param array<mixed> $data
     * @param string $missingKey
     */
    public function testCreateWithMissingFields(array $data, string $missingKey): void
    {
        self::expectException(MissingRequiredFieldsException::class);
        self::expectExceptionMessage($missingKey);
        $this->serializer
            ->deserialize(Argument::any(), Argument::any(), Argument::any())
            ->shouldNotBeCalled();
        $this->getModelFactory()->create($data);
    }

    public function testCreateWithFailedDeserialize(): void
    {
        $this->encoder->encode($this->getModelData(), $this->format)->willReturn(json_encode($this->getModelData()));
        $this->serializer
            ->deserialize(json_encode($this->getModelData()), $this->getModel(), $this->format)
            ->shouldBeCalled()
            ->willThrow(InvalidArgumentException::class);
        self::expectException(InvalidArgumentException::class);
        $this->getModelFactory()->create($this->getModelData());
    }

    public function testCreateWithFailedEncode(): void
    {
        $this->encoder
            ->encode($this->getModelData(), $this->format)
            ->willThrow(UnexpectedValueException::class);
        self::expectException(InvalidArgumentException::class);
        $this->getModelFactory()->create($this->getModelData());
    }

    /**
     * @return SerializerInterface
     */
    protected function getSerializer(): SerializerInterface
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();

        return $serializer;
    }

    /**
     * @return EncoderInterface
     */
    protected function getEncoder(): EncoderInterface
    {
        /** @var EncoderInterface $encoder */
        $encoder = $this->encoder->reveal();

        return $encoder;
    }

    /**
     * @return Model
     */
    abstract protected function getModelInstance(): Model;
}
