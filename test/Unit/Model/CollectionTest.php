<?php declare(strict_types=1);

namespace Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\TestCase;

use function array_map;
use function count;
use function current;
use function range;

class CollectionTest extends TestCase
{
    public function testCreateCollection(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        self::assertSame($models, $collection->all());
        self::assertSame($count, $collection->count());
        self::assertSame($count, $collection->totalCount());
    }

    public function testTotalModelsNotMatchingModelsCount(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count + 10, $models);

        self::assertSame($models, $collection->all());
        self::assertSame($count, $collection->count());
        self::assertSame($count + 10, $collection->totalCount());
    }

    public function testCollectionMap(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        /** @var Comment $firstModel */
        $firstModel = current($models);
        $name = $firstModel->getAttribute('name') . 'test';
        /** @var Collection $mappedCollection */
        $mappedCollection = $collection->map(function (Model $comment) use ($name) {
            return $comment->setAttribute('name', $name);
        });

        self::assertNotSame($collection, $mappedCollection);
        self::assertSame($models, $mappedCollection->all());
        self::assertSame($count, $mappedCollection->count());
        self::assertSame($count, $mappedCollection->totalCount());

        /** @var Comment $model */
        foreach ($mappedCollection->all() as $model) {
            self::assertSame($name, $model->getAttribute('name'));
        }
    }

    public function testCollectionFilter(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        /** @var Comment $firstModel */
        $firstModel = current($models);
        $name = $firstModel->getAttribute('name') . 'test';

        /** @var Collection $filteredCollection */
        $filteredCollection = $collection->filter(function (Model $comment) use ($name) {
            return $comment->getAttribute('name') === $name;
        });

        self::assertNotEquals($collection, $filteredCollection);
        self::assertNotEquals($models, $filteredCollection->all());
        self::assertSame(0, $filteredCollection->count());
        self::assertSame($count, $filteredCollection->totalCount());
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

    /**
     * @return iterable<mixed>
     * @throws InvalidArgumentException
     */
    public function provideIsEmptyCases(): iterable
    {
        $models = $this->getModelsTestData();

        yield [new Collection(0, []), true];
        yield [ new Collection(15, []), true];
        yield [ new Collection(0, $models), false];
        yield [ new Collection(0, $models), false];
    }

    /**
     * @return Model[]
     * @throws InvalidArgumentException
     */
    private function getModelsTestData(): array
    {
        return array_map(function () {
            return (new CommentData)->getFilledInstance();
        }, range(0, 10));
    }
}
