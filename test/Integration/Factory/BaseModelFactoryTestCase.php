<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\FactoryTestCase;

/**
 * Class BaseModelFactoryTestCase
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
abstract class BaseModelFactoryTestCase extends ContainerAwareBaseTestCase
{
    use StringHelper;

    use FactoryTestCase;

    private const ATOMIC_VALUE = 'string';

    public function testCreateValidModel(): void
    {
        $modelData = $this->getModelData();
        $model = $this->getModelFactory()->create($modelData);
        self::assertInstanceOf($this->getModel(), $model);
        $this->assertArrayEqualsObjectFields($model, $modelData);
    }

    /**
     * @dataProvider provideDataWithInvalidTypes
     * @param array<mixed> $data
     * @param string $invalidKey
     */
    public function testCreateWithInvalidTypes(array $data, string $invalidKey): void
    {
        self::expectException(InvalidArgumentException::class);
        if (! $data[$invalidKey] instanceof \stdClass) {
            self::expectExceptionMessage(gettype(self::ATOMIC_VALUE));
        } else {
            self::expectExceptionMessage($this->snakeCaseToCamelCase($invalidKey));
        }

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
        self::expectExceptionMessage($missingKey);
        $this->getModelFactory()->create($data);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithInvalidTypes(): iterable
    {
        foreach ($this->getModelData() as $key => $value) {
            $commentDataCopy = $this->getModelData();

            if (is_array($value)) {
                /**
                 * All json objects are arrays, if it's an object,
                 * change its type to an atomic value
                 */
                $commentDataCopy[$key] = self::ATOMIC_VALUE;
            } else {
                $commentDataCopy[$key] = new \stdClass;
            }

            yield [$commentDataCopy, $key];
        }
    }
}
