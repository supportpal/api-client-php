<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Collection;

use stdClass;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\TestCase;

use function array_map;
use function array_merge;
use function array_pop;
use function count;
use function current;
use function range;

/**
 * Class CollectionTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Collection
 * @covers \SupportPal\ApiClient\Model\Collection\Collection
 */
class CollectionTest extends TestCase
{
    public function testCreateCollection(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        self::assertSame($models, $collection->getModels());
        self::assertSame($count, $collection->getCount());
        self::assertSame($count, $collection->getModelsCount());
    }

    public function testTotalModelsNotMatchingModelsCount(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count + 10, $models);

        self::assertSame($models, $collection->getModels());
        self::assertSame($count, $collection->getModelsCount());
        self::assertSame($count + 10, $collection->getCount());
    }

    public function testCollectionMap(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        /** @var Comment $firstModel */
        $firstModel = current($models);
        $name = $firstModel->getName() . 'test';
        $mappedCollection = $collection->map(function (Comment $comment) use ($name) {
            return $comment->setName($name);
        });

        self::assertNotSame($collection, $mappedCollection);
        self::assertSame($models, $mappedCollection->getModels());
        self::assertSame($count, $mappedCollection->getCount());
        self::assertSame($count, $mappedCollection->getModelsCount());

        /** @var Comment $model */
        foreach ($mappedCollection->getModels() as $model) {
            self::assertSame($name, $model->getName());
        }
    }

    public function testCollectionFilter(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        /** @var Comment $firstModel */
        $firstModel = current($models);
        $name = $firstModel->getName() . 'test';

        $mappedCollection = $collection->filter(function (Comment $comment) use ($name) {
            return $comment->getName() === $name;
        });

        self::assertNotSame($collection, $mappedCollection);
        self::assertNotSame($models, $mappedCollection->getModels());
        self::assertSame($count, $mappedCollection->getCount());
        self::assertSame(0, $mappedCollection->getModelsCount());
    }

    public function testCollectionFirst(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        self::assertSame($models[0], $collection->first());
        for ($i = 1; $i < $count; ++$i) {
            self::assertNotSame($models[$i], $collection->first());
        }
    }

    /**
     * @param Collection $collection
     * @param bool $actualIsEmpty
     * @dataProvider provideIsEmptyCases
     */
    public function testCollectionIsEmpty(Collection $collection, bool $actualIsEmpty): void
    {
        self::assertSame($collection->isEmpty(), $actualIsEmpty);
    }

    public function testCreateWithDifferentModels(): void
    {
        self::expectException(InvalidArgumentException::class);
        new Collection(2, [new Comment, new Article]);
    }

    public function testCreateWithInvalidTypes(): void
    {
        self::expectException(InvalidArgumentException::class);
        /** @var Model[] $models */
        $models = [new stdClass, new stdClass];
        new Collection(2, $models);
    }

    public function testMerge(): void
    {
        $models1 = $this->getModelsTestData();
        $models2 = $this->getModelsTestData();
        array_pop($models2);

        $collection1 = new Collection(count($models1), $models1);
        $collection2 = new Collection(count($models2), $models2);

        $merged = $collection1->merge($collection2);
        $arraysMerge = array_merge($models1, $models2);
        self::assertSame($arraysMerge, $merged->getModels());
        self::assertSame(count($models2), $merged->getCount());
        self::assertSame(count($arraysMerge), $merged->getModelsCount());
    }

    /**
     * @return iterable<mixed>
     * @throws InvalidArgumentException
     */
    public function provideIsEmptyCases(): iterable
    {
        $models = $this->getModelsTestData();

        yield [new Collection(0, []), true];
        yield [new Collection(15, []), true];
        yield [new Collection(0, $models), false];
        yield [new Collection(0, $models), false];
    }

    /**
     * @return Comment[]
     * @throws InvalidArgumentException
     */
    private function getModelsTestData(): array
    {
        return array_map(function () {
            return (new CommentData)->getFilledInstance();
        }, range(0, 10));
    }
}
