<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\NotSupportedException;
use SupportPal\ApiClient\Factory\Core\CoreSettingsFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\CommentFactory;
use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\CoreSettings;
use SupportPal\ApiClient\Model\SelfService\Comment;

/**
 * Class ModelCollectionFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\ModelCollectionFactory
 */
class ModelCollectionFactoryTest extends TestCase
{
    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $commentFactory;
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $coreSettingsFactory;

    /**
     * @var array<string, ObjectProphecy>
     */
    private $factories;

    protected function setUp(): void
    {
        parent::setUp();
        $this->commentFactory = $this->prophesize(CommentFactory::class);
        $this->commentFactory->getModel()->willReturn(Comment::class);
        $this->coreSettingsFactory = $this->prophesize(CoreSettingsFactory::class);
        $this->coreSettingsFactory->getModel()->willReturn(CoreSettings::class);
        $this->factories = [
            Comment::class => $this->commentFactory,
            CoreSettings::class => $this->coreSettingsFactory,
        ];

        $this->modelCollectionFactory = new ModelCollectionFactory(
            $this->getFactories()
        );
    }

    public function testCreateWithInvalidFactory(): void
    {
        self::expectException(InvalidArgumentException::class);
        $api = $this->prophesize(ApiClient::class);
        /** @var iterable<ModelFactory> $iterable */
        $iterable = [$api->reveal()];
        new ModelCollectionFactory($iterable);
    }

    public function testCreateWithUnsupportedModel(): void
    {
        self::expectException(NotSupportedException::class);
        $this->modelCollectionFactory->create(BaseModel::class, ['test' => 'test']);
    }

    /**
     * @dataProvider provideValidModelsData
     * @param class-string $factoryModel
     */
    public function testCreateWithSupportedModel(string $factoryModel): void
    {
        $this->factories[$factoryModel]
            ->create(['test' => 'test'])
            ->shouldBeCalled()
            ->willReturn($this->prophesize($factoryModel)->reveal());
        $model = $this->modelCollectionFactory->create($factoryModel, ['test' => 'test']);
        $this->assertInstanceOf($factoryModel, $model);
    }

    /**
     * @return iterable<array<int, string>>
     */
    public function provideValidModelsData(): iterable
    {
        yield [Comment::class];
        yield [CoreSettings::class];
    }

    /**
     * @return iterable<ModelFactory>
     */
    private function getFactories(): iterable
    {
        foreach ($this->factories as $factoryProphecy) {
            /** @var ModelFactory $factory */
            $factory = $factoryProphecy->reveal();

            yield $factory;
        }
    }
}
