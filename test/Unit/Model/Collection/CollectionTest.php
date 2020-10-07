<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Collection;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\TestCase;

class CollectionTest extends TestCase
{
    public function testCreateCollection(): void
    {
        $models = $this->getModelsTestData();
        $count = count($models);
        $collection = new Collection($count, $models);

        $this->assertSame($models, $collection->getModels());
        $this->assertSame($count, $collection->getCount());
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
        /** @var Comment $model */
        foreach ($mappedCollection->getModels() as $model) {
            $this->assertSame($name, $model->getName());
        }
    }

    public function testCollectioFilter(): void
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
        $this->assertNotSame($count, $mappedCollection->getCount());
        $this->assertSame(0, $mappedCollection->getCount());
    }

    /**
     * @return Comment[]
     * @throws InvalidArgumentException
     */
    private function getModelsTestData(): array
    {
        return array_map(function () {
            return (new Comment)->fill(CommentData::COMMENT_DATA);
        }, range(0, 10));
    }
}
