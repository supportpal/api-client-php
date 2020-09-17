<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;

abstract class BaseModelTestCase extends TestCase
{

    use StringHelper;

    public function testCreateModel():void
    {
        $model = $this->getModel();
        $model->fill($this->getModelData());
        $this->assertArrayEqualsObjectFields($model, $this->getModelData());
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
     * @param object $obj
     * @param array<mixed> $array
     */
    protected function assertArrayEqualsObjectFields(object $obj, array $array): void
    {
        foreach ($array as $key => $value) {
            self::assertSame($value, $obj->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }

    /**
     * @return array<mixed>
     */
    abstract protected function getModelData(): array;

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;

    /**
     * @return array<mixed>
     */
    abstract protected function getInvalidTypesData(): array;
}
