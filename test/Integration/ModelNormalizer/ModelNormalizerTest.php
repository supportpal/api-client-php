<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ModelNormalizer;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Normalizer\ModelNormalizer;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
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
                /**
                 * normalizer skips null values
                 */
                if (isset($arr2[$key])) {
                    $this->assertSame($value, $arr2[$key]);
                } else {
                    self::assertNull($value);
                }
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
        $departmentData = new DepartmentData;
        $channelSettingsData = new ChannelSettingsData;
        $ticketCustomFieldData = new TicketCustomFieldData;
        $priorityData = new PriorityData;
        $statusData = new StatusData;
        $attachmentData = new AttachmentData;
        $ticketData = new TicketData;
        $messageData = new MessageData;

        yield [$departmentData->getFilledInstance(), $departmentData->getArrayData()];
        yield [$channelSettingsData->getFilledInstance(), $channelSettingsData->getArrayData()];
        yield [$ticketCustomFieldData->getFilledInstance(), $ticketCustomFieldData->getArrayData()];
        yield [$priorityData->getFilledInstance(), $priorityData->getArrayData()];
        yield [$statusData->getFilledInstance(), $statusData->getArrayData()];
        yield [$attachmentData->getFilledInstance(), $attachmentData->getArrayData()];
        yield [$ticketData->getFilledInstance(), $ticketData->getArrayData()];
        yield [$messageData->getFilledInstance(), $messageData->getArrayData()];
    }
}
