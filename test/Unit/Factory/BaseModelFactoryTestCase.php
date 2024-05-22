<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\FactoryTestCase;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

/**
 * Class BaseModelFactoryTestCase
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @coversNothing
 */
abstract class BaseModelFactoryTestCase extends TestCase
{
    use FactoryTestCase;
    use PhpUnitCompatibilityTrait;
    use StringHelper;

    public function testCreateModel(): void
    {
        $model = $this->getModelFactory()->create($this->getModelData());
        self::assertInstanceOf($this->getModel(), $model);
    }

    /**
     * @return Model
     */
    abstract protected function getModelInstance(): Model;
}
