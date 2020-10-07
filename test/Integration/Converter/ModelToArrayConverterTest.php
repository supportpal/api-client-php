<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Converter;

use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Core\CoreSettings;
use SupportPal\ApiClient\Model\Core\User;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Model\Ticket\Department;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;

class ModelToArrayConverterTest extends ContainerAwareBaseTestCase
{
    /**
     * @var ModelToArrayConverter
     */
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
        yield [(new Comment)->fill(CommentData::COMMENT_DATA)];
        yield [(new CoreSettings)->fill(CoreSettingsData::CORE_SETTINGS_DATA)];
        yield [(new User)->fill(UserData::USER_DATA)];
        yield [(new Department)->fill(DepartmentData::DEPARTMENT_DATA)];
    }
}
