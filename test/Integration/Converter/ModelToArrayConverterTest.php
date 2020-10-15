<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Converter;

use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class ModelToArrayConverterTest extends ContainerAwareBaseTestCase
{
    /** @var ModelToArrayConverter */
    private $modelToArrayConverter;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var ModelToArrayConverter $modelToArrayConverter */
        $modelToArrayConverter = $this->getContainer()->get(ModelToArrayConverter::class);
        $this->modelToArrayConverter = $modelToArrayConverter;
    }

    /**
     * @param Model $model
     * @dataProvider provideModelCases
     */
    public function testConvertModel(Model $model): void
    {
        $arrayModel = $this->modelToArrayConverter->convertOne($model);
        $this->assertArrayEqualsObjectFields($model, $arrayModel);
    }

    /**
     * @return iterable<array<Model>>
     * @throws InvalidArgumentException
     */
    public function provideModelCases(): iterable
    {
        yield [CommentData::getFilledInstance()];
        yield [UserData::getFilledInstance()];
        yield [DepartmentData::getFilledInstance()];
    }
}
