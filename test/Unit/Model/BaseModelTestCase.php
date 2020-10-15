<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use stdClass;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;

/**
 * Class BaseModelTestCase
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\BaseModel
 */
abstract class BaseModelTestCase extends TestCase
{
    use StringHelper;

    public function testCreateModel():void
    {
        $model = $this->getModel();
        $modelData = $this->getModelData();
        $model->fill($modelData);
        $this->assertArrayEqualsObjectFields($model, $modelData);
    }

    public function testFillModelWithIncorrectData(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $model = $this->getModel();
        /** @var array<string, mixed> $testArray */
        $testArray = ['article_id','type_id','text'];
        $model->fill($testArray);
    }

    /**
     * @dataProvider provideDataWithInvalidTypes
     * @param array<mixed> $data
     * @param string $invalidKey
     */
    public function testCreateWithInvalidTypes(array $data, string $invalidKey): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage($this->snakeCaseToPascalCase($invalidKey));
        $model = $this->getModel();
        $model->fill($data);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithInvalidTypes(): iterable
    {
        foreach ($this->getInvalidTypesData() as $key => $value) {
            $commentDataCopy = $this->getModelData();
            $commentDataCopy[$key] = $value;

            yield [$commentDataCopy, $key];
        }
    }

    /**
     * @return array<mixed>
     */
    protected function getInvalidTypesData(): array
    {
        $data = [];
        foreach ($this->getModelData() as $key => $value) {
            $data[$key] = new stdClass;
        }

        return $data;
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getModelData(): array;

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;
}
