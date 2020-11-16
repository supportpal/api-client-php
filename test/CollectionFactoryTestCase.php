<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\SelfService\Tag;

use function count;

abstract class CollectionFactoryTestCase extends ContainerAwareBaseTestCase
{
    /** @var CollectionFactory */
    protected $collectionFactory;

    /**
     * @param array<mixed> $input
     * @dataProvider provideInvalidInputs
     */
    public function testCreateWithInvalidInput(array $input): void
    {
        self::expectException(InvalidArgumentException::class);
        $this->collectionFactory->create(1, $input);
    }

    public function testCreateWithValidInput(): void
    {
        $input = [new Comment, new Comment, new Comment];
        $collection = $this->collectionFactory->create(count($input), $input);
        self::assertSame(count($input), $collection->getCount());
        self::assertSame(count($input), $collection->getModelsCount());
        self::assertSame($input, $collection->getModels());
    }

    public function testTotalModelsNotMatchingModelsCount(): void
    {
        $input = [new Comment, new Comment, new Comment];
        $collection = $this->collectionFactory->create(count($input) + 10, $input);
        self::assertSame(count($input) + 10, $collection->getCount());
        self::assertSame(count($input), $collection->getModelsCount());
        self::assertSame($input, $collection->getModels());
    }

    /**
     * @return iterable<mixed>
     */
    public function provideInvalidInputs(): iterable
    {
        return [
            'all invalid types' => [['test', 'test']],
            'mixed invalid types with comment' => [['test', new Comment]],
            'mixed invalid types with tag' => [[new Tag, 'test', new Tag]],
            'mixed valid types' => [[new Tag, new Tag, new Comment]],
        ];
    }
}
