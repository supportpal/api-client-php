<?php


namespace SupportPal\ApiClient\Tests\Integration\ModelNormalizer;


use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Normalizer\ModelNormalizer;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\TestCase;
use SupportPal\ApiClient\Transformer\FieldTransformer;
use Symfony\Component\Serializer\Serializer;

class ModelNormalizerTest extends ContainerAwareBaseTestCase
{

    /**
     * @var ModelNormalizer
     */
    private $normalizer;

    /**
     * @var FieldTransformer[]
     */
    private $transformers;

    protected function setUp(): void
    {
        parent::setUp();
         $this->getContainer()->get(Serializer::class);
        $normalizer = $this->getContainer()->get(ModelNormalizer::class);

        $filters = $this->getContainer()->findTaggedServiceIds('transformer.field_transformer');
        foreach ($filters as $serviceName => $_) {
            $this->transformers[] = $this->getContainer()->get($serviceName);
        }

        /** @var ModelNormalizer normalizer */
        $this->normalizer = $normalizer;
    }

    /**
     * @param Model $model
     * @param array $data
     * @dataProvider provideObjects
     */
    public function testNormalizer(Model $model, array $data)
    {
        $normalizedObject = $this->normalizer->normalize($model);
        $data = $this->applyTransformers($data);
        $this->assertArraysEqual($data, $normalizedObject);
    }

    public function assertArraysEqual(array $arr1, array $arr2)
    {
        foreach ($arr1 as $key => $value) {
            if (is_array($value)) {
                $this->assertArraysEqual($value, $arr2[$key]);
            } else {
                $this->assertSame($value, $arr2[$key]);
            }
        }
    }

    private function applyTransformers(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->applyTransformers($value);
                continue;
            }

            foreach ($this->transformers as $transformer) {
                if ($transformer->canTransform($value)) {
                  $data[$key] = $transformer->transform($value);
                }
            }
        }

        return $data;
    }

    public function provideObjects(): iterable
    {
        yield [CommentData::getFilledInstance(), CommentData::DATA];
        yield [TicketData::getFilledInstance(), TicketData::DATA];
        yield [UserData::getFilledInstance(), UserData::DATA];
        yield [DepartmentData::getFilledInstance(), DepartmentData::DATA];
    }
}
