<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use stdClass;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\FactoryTestCase;

use function gettype;
use function is_array;

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
        if (! $data[$invalidKey] instanceof stdClass) {
            self::expectExceptionMessage(gettype(self::ATOMIC_VALUE));
        }

        if ($data[$invalidKey] instanceof stdClass) {
            self::expectExceptionMessage($this->snakeCaseToCamelCase($invalidKey));
        }

        $this->getModelFactory()->create($data);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithInvalidTypes(): iterable
    {
        foreach ($this->getModelData() as $key => $value) {
            $commentDataCopy = $this->getModelData();

            /**
             * test only support atomic values.
             * Serializer dependency returns empty objects in case of not matching data attributes
             * This shouldn't be a problem, since factories are only used internally (mapping API responses)
             * Null values are also not processed.
             */
            if (is_array($value) || $value === null) {
                continue;
            }

            $commentDataCopy[$key] = new stdClass;

            yield [$commentDataCopy, $key];
        }
    }
}
