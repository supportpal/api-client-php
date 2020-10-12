<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Collection;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\TestCase;

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

        $this->assertSame($models, $collection->getModels());
        $this->assertSame($count, $collection->getCount());
        $this->assertSame($count, $collection->getModelsCount());
    }

    public function testTotalModelsNotMatchingModelsCount(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count + 10, $models);

        $this->assertSame($models, $collection->getModels());
        $this->assertSame($count, $collection->getModelsCount());
        $this->assertSame($count + 10, $collection->getCount());
    }

    public function testCollectionMap(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        $name = current($models)->getName() . 'test';
        $mappedCollection = $collection->map(function (Comment $comment) use ($name) {
            return $comment->setName($name);
        });

        $this->assertNotSame($collection, $mappedCollection);
        $this->assertSame($models, $mappedCollection->getModels());
        $this->assertSame($count, $mappedCollection->getCount());
        $this->assertSame($count, $mappedCollection->getModelsCount());

        /** @var Comment $model */
        foreach ($mappedCollection->getModels() as $model) {
            $this->assertSame($name, $model->getName());
        }
    }

    public function testCollectionFilter(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        $name = current($models)->getName() . 'test';

        $mappedCollection = $collection->filter(function (Comment $comment) use ($name) {
            return $comment->getName() == $name;
        });

        $this->assertNotSame($collection, $mappedCollection);
        $this->assertNotSame($models, $mappedCollection->getModels());
        $this->assertSame($count, $mappedCollection->getCount());
        $this->assertSame(0, $mappedCollection->getModelsCount());
    }

    public function testCreateWithDifferentModels(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Collection(2, [new Comment, new Article]);
    }

    public function testCreateWithInvalidTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        /** @var Model[] $models */
        $models = [new \stdClass, new \stdClass];
        new Collection(2, $models);
    }

    /**
     * @return Comment[]
     * @throws InvalidArgumentException
     */
    private function getModelsTestData(): array
    {
        return array_map(function () {
            return CommentData::getFilledInstance();
        }, range(0, 10));
    }
}
