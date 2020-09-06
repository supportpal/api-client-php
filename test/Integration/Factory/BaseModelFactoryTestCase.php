<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Tests\ApiAwareBaseTestClass;
use SupportPal\ApiClient\Tests\FactoryTestCase;

abstract class BaseModelFactoryTestCase extends ApiAwareBaseTestClass
{
    use StringHelper;

    use FactoryTestCase;

    public function testCreateValidModel(): void
    {
        $model = $this->getModelFactory()->create($this->getModelData());
        self::assertInstanceOf($this->getModel(), $model);
        foreach ($this->getModelData() as $key => $value) {
            self::assertSame($value, $model->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }
    /**
     * @dataProvider provideDataWithInvalidTypes
     * @param array<mixed> $data
     * @param string $invalidKey
     */
    public function testCreateWithInvalidTypes(array $data, string $invalidKey): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage($this->snakeCaseToCamelCase($invalidKey));
        $this->getModelFactory()->create($data);
    }

    /**
     * @dataProvider provideDataWithMissingFields
     * @param array<mixed> $data
     * @param string $missingKey
     */
    public function testCreateWithMissingFields(array $data, string $missingKey): void
    {
        self::expectException(MissingRequiredFieldsException::class);
        self::expectExceptionMessage($this->snakeCaseToCamelCase($missingKey));
        $this->getModelFactory()->create($data);
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
    abstract protected function getInvalidTypesData(): array;
}
