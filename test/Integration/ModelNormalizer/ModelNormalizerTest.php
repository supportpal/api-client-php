<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ModelNormalizer;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Normalizer\ModelNormalizer;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

use function is_array;

class ModelNormalizerTest extends ContainerAwareBaseTestCase
{
    /** @var ModelNormalizer */
    private $normalizer;

    /** @var Transformer[] */
    private $transformers;

    protected function setUp(): void
    {
        parent::setUp();
        $this->getContainer()->get(Serializer::class);
        /** @var ModelNormalizer $normalizer */
        $normalizer = $this->getContainer()->get(ModelNormalizer::class);

        $filters = $this->getContainer()->findTaggedServiceIds('transformer.field_transformer');
        foreach ($filters as $serviceName => $_) {
            /** @var Transformer $transformer */
            $transformer = $this->getContainer()->get($serviceName);
            $this->transformers[] = $transformer;
        }

        $this->normalizer = $normalizer;
    }

    /**
     * @param Model $model
     * @param array<mixed> $data
     * @dataProvider provideObjects
     * @throws ExceptionInterface
     */
    public function testNormalizer(Model $model, array $data): void
    {
        /** @var array<mixed> $normalizedObject */
        $normalizedObject = $this->normalizer->normalize($model);
        $data = $this->applyTransformers($data);
        $this->assertArraysEqual($data, $normalizedObject);
    }

    public function testDenormalizer(): void
    {
        /** @var Model $denormalizedObject */
        $denormalizedObject = $this->normalizer->denormalize(TicketData::DATA, Ticket::class, $this->getFormatType());
        $this->assertInstanceOf(Ticket::class, $denormalizedObject);
        $this->assertArrayEqualsObjectFields($denormalizedObject, TicketData::DATA);
    }

    public function testDenormalizeReturnsNull(): void
    {
        $denormalized = $this->normalizer->denormalize([], Ticket::class, $this->getFormatType());
        $this->assertNull($denormalized);
    }

    /**
     * @param array<mixed> $arr1
     * @param array<mixed> $arr2
     */
    public function assertArraysEqual(array $arr1, array $arr2): void
    {
        foreach ($arr1 as $key => $value) {
            if (is_array($value)) {
                $this->assertArraysEqual($value, $arr2[$key]);
            } else {
                $this->assertSame($value, $arr2[$key]);
            }
        }
    }

    /**
     * @param array<mixed> $data
     * @return array<mixed>
     */
    private function applyTransformers(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->applyTransformers($value);
                continue;
            }

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
     * @return iterable<mixed>
     * @throws InvalidArgumentException
     */
    public function provideObjects(): iterable
    {
        yield [CommentData::getFilledInstance(), CommentData::DATA];
        yield [TicketData::getFilledInstance(), TicketData::DATA];
        yield [UserData::getFilledInstance(), UserData::DATA];
        yield [DepartmentData::getFilledInstance(), DepartmentData::DATA];
    }
}
