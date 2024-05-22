<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;

/**
 * Class BaseModelTestCase
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\Model
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

    /**
     * @return array<mixed>
     */
    abstract protected function getModelData(): array;

    /**
     * @return Model
     */
    abstract protected function getModel(): Model;
}
