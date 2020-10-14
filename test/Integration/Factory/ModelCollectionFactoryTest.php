<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

/**
 * Class ModelCollectionFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
class ModelCollectionFactoryTest extends ContainerAwareBaseTestCase
{
    private const MODELS_MAP = [
        Comment::class => CommentData::DATA,
        Article::class => ArticleData::DATA,
        User::class => UserData::DATA,
        Ticket::class => TicketData::DATA,
        Department::class => DepartmentData::DATA,
    ];

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ModelCollectionFactory $modelCollection */
        $modelCollection = $this->getContainer()->get(ModelCollectionFactory::class);
        $this->modelCollectionFactory = $modelCollection;
    }

    /**
     * @param array<mixed> $data
     * @param string $model
     * @dataProvider provideValidModelData
     */
    public function testCreateValidModel(array $data, string $model): void
    {
        $model = $this->modelCollectionFactory->create($model, $data);
        $this->assertArrayEqualsObjectFields($model, $data);
    }

    /**
     * @dataProvider provideDataWithInvalidTypes
     * @param array<mixed> $data
     * @param string $model
     * @param string $invalidKey
     */
    public function testCreateWithInvalidTypes(array $data, string $model, string $invalidKey): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage($this->snakeCaseToCamelCase($invalidKey));
        $this->modelCollectionFactory->create($model, $data);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideValidModelData(): iterable
    {
        foreach (self::MODELS_MAP as $model => $data) {
            yield [$data, $model];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithInvalidTypes(): iterable
    {
        foreach (self::MODELS_MAP as $model => $data) {
            foreach ($data as $key => $value) {
                /**
                 * test only support atomic values.
                 * Serializer dependency returns empty objects in case of not matching data attributes
                 * This shouldn't be a problem, since factories are only used internally (mapping API responses)
                 * Null values are also not processed.
                 */
                if (is_array($value) || $value === null) {
                    continue;
                }

                $dataCopy = self::MODELS_MAP[$model];
                $dataCopy[$key] = new \stdClass;

                yield [$dataCopy, $model, $key];
            }
        }
    }
}
