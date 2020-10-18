<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Shared;

use SupportPal\ApiClient\Model\SettingsModel;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\TestCase;

class SettingsTest extends TestCase
{
    public function testCreateModel():void
    {
        $model = $this->getModel();
        $modelData = $this->getModelData();
        $model->fill($modelData);
        $this->assertSame($model->getSettings(), $modelData);
    }

    /**
     * @return array<mixed>
     */
    protected function getModelData(): array
    {
        return (new CoreSettingsData)->getDataWithObjects();
    }

    /**
     * @return SettingsModel
     */
    protected function getModel(): SettingsModel
    {
        return new Settings;
    }
}
